<?php

namespace App\Controller;

use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Utility\Text;

class UsersController extends AppController
{

    public $name = 'Users';

    /**
     * @return \Cake\Network\Response|void
     * With this function user will login into the application.
     */
    public function login()
    {
        $this->checkAuthentication();
        $this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if ($this->Auth->user('email_verify') == 1) {
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Please verify your email before login'));
                    return $this->redirect(['controller' => 'users', 'action' => 'logout']);
                }
            } else {

                $this->Flash->error(__('Invalid username or password, try again'));
                return $this->redirect($this->referer());
            }
        }
    }

    /*    public function beforeFilter(Event $event)
        {
            parent::beforeFilter();
        }*/

    /**
     * @return \Cake\Network\Response|void
     * This function is for create account. After create account user will get a email confirmation email.
     */
    public function signup()
    {
        $this->viewBuilder()
            ->layout('login');
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['uuid'] = Text::uuid();
            $verifyCode = substr(Text::uuid(), 0, 32);
            $data['email_verifying_code'] = $verifyCode;
            if ($data['role'] == 2) {
                $user = $this->Users->newEntity(
                    $data,
                    [
                        'associated' => [
                            'Profiles' => ['validate' => 'seller']
                        ],
                    ]
                );
            } elseif ($data['role'] == 3) {
                $user = $this->Users->newEntity(
                    $data,
                    [
                        'associated' => [
                            'Profiles' => ['validate' => 'investor']
                        ],

                    ]
                );
            } else {
                $user = $this->Users->newEntity(
                    $data,
                    [
                        'associated' => [
                            'Profiles'
                        ],

                    ]
                );
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Signup successful! Please check your email to verify your email'));
                $this->Utilities->signupConfirmEmail($data, $verifyCode);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Sorry! something went wrong'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * @return \Cake\Network\Response|void
     * This function is for verify the user's email address after creating account.
     */
    public function verifyEmail()
    {
        if (!isset($this->request->query['code']) && !$this->request->query['code']) {
            throw new BadRequestException;
        }

        $code = $this->request->query['code'];
        $userInfo = $this->Users->getUserByEmailCode($code);
        if (!$userInfo) {
            throw new BadRequestException;
        }

        if ($userInfo->email_verify != 1) {
            $user = $this->Users->find('all')->where(['id' => $userInfo->id])->first();
            $user->email_verify = 1;
            $user->email_verifying_code = null;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your email address has been verified successfully'));
            } else {
                $this->Flash->error(__('Sorry! something went wrong'));
            }
        } else {
            $this->Flash->success(__('Your email is already verified'));
        }
        return $this->redirect(['controller' => 'users', 'action' => 'login']);
    }

    /**
     * @return \Cake\Network\Response|void
     */
    public function forgotPassword()
    {
        $this->checkAuthentication();
        $this->viewBuilder()
            ->layout('login');

        if ($this->request->is('post')) {

            if (!$this->request->data['username']) {
                $this->Flash->error(__('Please enter email address'));
                return $this->redirect(['controller' => 'users', 'action' => 'forgot-password']);
            }

            $userInfo = $this->Users->getUserByEmail($this->request->data['username']);
            if (!$userInfo) {
                $this->Flash->error(__('Sorry! this email is not registered'));
                return $this->redirect(['controller' => 'users', 'action' => 'forgot-password']);
            }

            $user = $this->Users->find('all')->where(['id' => $userInfo->id])->first();
            $forgotPassCode = substr(Text::uuid(), 0, 32);;
            $user->forgot_pass_code = $forgotPassCode;

            if ($this->Users->save($user)) {
                $this->Utilities->forgotPassEmail($userInfo, $forgotPassCode);
                $this->Flash->success(__('A reset password link has been sent to your email'));
                return $this->redirect(['controller' => 'users', 'action' => 'forgot-password']);
            } else {
                $this->Flash->error(__('Sorry! something went wrong'));
            }
        }
    }

    /**
     * @return \Cake\Network\Response|void
     */
    public function resetPassword()
    {
        $this->checkAuthentication();
        $this->viewBuilder()
            ->layout('login');

        if (!isset($this->request->query['code']) && !$this->request->query['code']) {
            throw new BadRequestException;
        }

        $code = $this->request->query['code'];
        $userInfo = $this->Users->getUserByForgotCode($code);
        if (!$userInfo) {
            throw new BadRequestException;
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->newEntity(
                $this->request->data,
                [
                    'associated' => ['Profiles'],
                    'validate' => 'ResetPassword'
                ]
            );
            $user->id = $userInfo->id;
            $user->forgot_pass_code = null;

            if ($this->Users->save($user)) {
                $this->Utilities->passwordChangedEmail($userInfo);
                $this->Flash->success(__('Password has been changed successfully'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            } else {
                $this->Flash->error(__('Sorry! something went wrong'));
            }
        }

        $this->set(compact('user', 'code'));
        $this->set('_serialize', ['user']);
    }

    /**
     *
     */
    public function index()
    {
        if ($this->loggedInUser->role != 1) {
            $this->Flash->error(__('Sorry, access denied'));
            $this->redirect(['controller' => 'dashboard', 'action' => 'add']);
        }

        $this->loadComponent('Paginator');
        $this->loadComponent('Utilities');
        $conditions = [];
        if (isset($this->request->query) && $this->request->query) {
            $response = $this->Utilities->buildUsesrListConditions($this->request->query);
            $conditions = array_merge($conditions, $response);
        }

        if (isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == 'admin') {
            $conditions = array_merge($conditions, ['Users.role' => 1]);
        }

        if (isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == 'seller') {
            $conditions = array_merge($conditions, ['Users.role' => 2]);
        }

        if (isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == 'investor') {
            $conditions = array_merge($conditions, ['Users.role' => 3]);
        }

        $this->paginate = [
            'conditions' => $conditions,
            'fields' =>
                [
                    'Users.id',
                    'Users.uuid',
                    'Users.username',
                    'Users.status',
                    'Users.role',
                    'Users.email_verify',
                    'Profiles.first_name',
                    'Profiles.last_name',
                    'Profiles.phone',
                    'Profiles.city',
                ],
            'contain' => [
                'Profiles' => [
                    'fields' => []
                ]
            ],
            'limit' => $this->paginationLimit,
            'order' => ['Users.id' => 'desc']
        ];

        $users = $this->paginate($this->Users);
        //dump($users); die();
        $this->set('users', $users);
        $this->set('_serialize', ['users']);

        $data = [];
        $data['userOverview'] = $this->Users->userOverview();
        $data['totalUser'] = $this->Users->totalUser();
        $this->set('data', $data);

    }

    /**
     * @return \Cake\Network\Response|void
     */
    public function add()
    {
        if ($this->loggedInUser->role != 1) {
            $this->Flash->error(__('Sorry, access denied'));
            $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['uuid'] = Text::uuid();
            $data['role'] = 2;
            $data['profile']['created_by'] = $this->userID;
            $verifyCode = substr(Text::uuid(), 0, 32);
            $data['email_verifying_code'] = $verifyCode;

            if (isset($data['profile']['birthday']) && $data['profile']['birthday']) {
                $data['profile']['birthday'] = date('Y-m-d', strtotime($data['profile']['birthday']));
            }

            $user = $this->Users->newEntity(
                $data,
                [
                    'associated' => ['Profiles']
                ]
            );

            if ($this->Users->save($user)) {
                $this->Utilities->signupConfirmEmail($data, $verifyCode);
                $this->Flash->success(__('New user has been created successfully'));
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Sorry! something went wrong'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * @param $uuid
     * @return \Cake\Network\Response|void
     */
    public function edit($uuid)
    {
        if ($this->loggedInUser->role != 1) {
            $this->Flash->error(__('Sorry, access denied'));
            $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
        }

        if (empty($uuid)) {
            throw new NotFoundException;
        }

        if (!is_numeric($uuid)) {
            $userID = $this->Users->getIDbyUUID($uuid);
        } else {
            $userID = $uuid;
        }

        $user = $this->Users->get(
            $userID,
            [
                'contain' => ['Profiles']
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User has been updated successfully'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Sorry, something went wrong'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * @param $uuid
     * @return \Cake\Network\Response|void
     */
    public function view($uuid)
    {
        if (empty($uuid)) {
            throw new NotFoundException;
        }

        if (!is_numeric($uuid)) {
            $userID = $this->Users->getIDbyUUID($uuid);
        } else {
            $userID = $uuid;
        }

        $user = $this->Users->get($userID, ['contain' => ['Profiles']]);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * @return \Cake\Network\Response|void
     */
    public function profile()
    {
        $user = $this->Users->get($this->userID, ['contain' => ['Profiles']]);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * @return \Cake\Network\Response|void
     */
    public function update()
    {
        $user = $this->Users->get(
            $this->userID,
            [
                'contain' => ['Profiles']
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile is updated'));
                return $this->redirect(['users' > 'users', 'action' => 'profile']);
            } else {
                $this->Flash->error(__('Sorry, something went wrong'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function changePassword()
    {
        $user = $this->Users->get($this->userID);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity(
                $user,
                $this->request->data,
                [
                    'validate' => 'ChangePassword'
                ]
            );
            $user->password = $this->request->data['new_password'];
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Password changes successfully'));
                return $this->redirect(['users' > 'users', 'action' => 'profile']);
            } else {
                $this->Flash->error(__('Sorry, something went wrong'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function changePhoto()
    {
        $directory = strtolower(str_replace(' ', '-', $this->userID));
        $rootDir = WWW_ROOT . 'img/profiles';
        $path = $rootDir . '/' . $directory;
        $folder = new Folder();
        if (!is_dir($path)) {
            $folder->create($path);
        }

        $profileImg['profile']['profile_pic'] = '';
        if (isset($this->request->data['photo']['name']) && $this->request->data['photo']['name']) {
            $profileImg['profile']['profile_pic'] = $this->userID . '/' . $this->Utilities->uploadProfilePhoto(
                    $path,
                    $this->request->data['photo']
                );
        }

        $user = $this->Users->get(
            $this->userID,
            [
                'contain' => ['Profiles']
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $profileImg);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile photo updated successfully'));
            } else {
                $this->Flash->error(__('Sorry, something went wrong'));
            }
        }

        return $this->redirect(['users' > 'users', 'action' => 'profile']);
    }

    /**
     * @param null $id
     * @return \Cake\Network\Response|void
     */
    public function delete($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->error(__('The user has been deleted'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Search Functionality for user
     */
    public function search()
    {

    }

    /**
     * @return \Cake\Network\Response|void
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function subscribe()
    {
        $subscribeTable = TableRegistry::get('Subscriptions');

        $subscription = $subscribeTable->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            //dump($data); die();
            $subscription->ip_address = $this->getIpAddress();
            $subscription->email = $data['email'];
            $admins = $this->Users->find()->where(['role' => 1])->all();
            $isNew = $subscribeTable->newEmail($data['email']);
            if ($isNew) {
                if ($subscribeTable->save($subscription)) {
                    $this->Utilities->sendEmailOnSubscription($data, $admins);
                    $this->Flash->success(
                        'Thank you very much for your subscription'
                    );
                } else {
                    $this->Flash->error(
                        'There was a problem submitting your form.'
                    );
                }
            } else {
                $this->Flash->error(
                    'Sorry, this email is already subscribed'
                );
            }

            $this->redirect($this->referer());
        }
    }

    public function subscriber()
    {
        $this->loadModel('Subscriptions');
        $request = $this->request->query;
        $this->paginate = [
            'finder' => [
                'list' => [
                    'request' => $request,
                ]
            ]
        ];

        $subscriptions = $this->paginate($this->Subscriptions);
        $this->set('subscriptions', $subscriptions);

    }

    public function start()
    {
        $this->viewBuilder()->layout('signup');

        $q = $this->request->query('user');

        if ($q == 'investor') {
            $this->request->session()->write('UserInfo.role', 3);
            return $this->redirect(['action' => 'terms_and_conditions']);
        } elseif ($q == 'selling') {
            $this->request->session()->write('UserInfo.role', 2);

            return $this->redirect(['action' => 'seller_type']);
        }
    }

    public function termsAndConditions()
    {
        $this->viewBuilder()->layout('signup');
        $user = $this->request->query('user');

/*        if ($q == 'yes') {
            $this->request->session()->write('UserInfo.tos', 1);
            if ($this->request->session()->read('UserInfo.role') == 3) {
                return $this->redirect(['action' => 'investor']);
            }
        }*/

        if (isset($user)) {
            $q = $this->request->query('tos');
            if ($q == 'yes') {
                $sellerValue = $this->sellerUser($user);
                $this->request->session()->write('UserInfo.profile.seller_type', $sellerValue);
                $this->request->session()->write('UserInfo.tos', 1);
                return $this->redirect(
                    [
                        'action' => $user,
                        "?" => [
                            "user" => $user
                        ]
                    ]
                );

            }
        }
    }

    public function sellerType()
    {
        $this->viewBuilder()->layout('signup');
        $user = $this->request->query('seller');
        if (isset($user)) {
            $sellerValue = $this->sellerUser($user);
            $this->request->session()->write('UserInfo.profile.seller_type', $sellerValue);

            return $this->redirect(
                [
                    'action' => 'terms_and_conditions',
                    "?" => [
                        "user" => $user
                    ]
                ]
            );
        }
    }

    public function investor()
    {

        if ($this->request->is('post')) {
            $data = $this->request->data();
            $previousSession = $this->request->session()->read('UserInfo');
            $newSession = array_merge($previousSession, $data);
            $this->request->session()->write('UserInfo', $newSession);
            return $this->redirect(['action' => 'complete']);
        }
        $this->viewBuilder()->layout('signup');

    }

    public function investor_cost()
    {

    }

    public function investor_signup()
    {

    }


    public function homeOwner()
    {
        $this->viewBuilder()->layout('signup');
        $session = $this->request->session()->read('UserInfo');
        $data = $this->request->data();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity(
                $data,
                [
                    'associated' => [
                        'Profiles'
                    ],
                ]
            );

            if (empty($user->errors())) {
                $data = $this->request->data();
                $profileInfo2 = array_merge($session['profile'], $data['profile']);
                $profileInfo = array_merge($session, $data);
                $profileInfo['profile'] = $profileInfo2;
                $this->request->session()->write('UserInfo', $profileInfo);
                return $this->redirect(['action' => 'done']);
            }
        }
        $this->set('user', $user);

    }

    public function agent()
    {
        $this->viewBuilder()->layout('signup');
        $session = $this->request->session()->read('UserInfo');

        $user = $this->Users->newEntity();
        $data = $this->request->data();

        if ($this->request->is('post')) {

            $user = $this->Users->newEntity(
                $data,
                [
                    'associated' => [
                        'Profiles'
                    ],
                ]
            );

            if (empty($user->errors())) {
                $data = $this->request->data();
                $profileInfo2 = array_merge($session['profile'], $data['profile']);
                $profileInfo = array_merge($session, $data);
                $profileInfo['profile'] = $profileInfo2;
                $this->request->session()->write('UserInfo', $profileInfo);
                return $this->redirect(['action' => 'done']);
            }

        }
        $this->set('user', $user);
    }

    public function wholeSeller()
    {
        $this->viewBuilder()->layout('signup');
        $user = $this->Users->newEntity();
        $session = $this->request->session()->read('UserInfo');
        $data = $this->request->data();

        if ($this->request->is('post')) {
            $user = $this->Users->newEntity(
                $data,
                [
                    'associated' => [
                        'Profiles'
                    ],
                ]
            );

            if (empty($user->errors())) {
                $data = $this->request->data();
                $profileInfo2 = array_merge($session['profile'], $data['profile']);
                $profileInfo = array_merge($session, $data);
                $profileInfo['profile'] = $profileInfo2;
                $this->request->session()->write('UserInfo', $profileInfo);
                return $this->redirect(['action' => 'done']);
            }

        }
        $this->set('user', $user);

    }

    public function complete()
    {
        $this->viewBuilder()->layout('signup');
        $data = $this->request->session()->read('UserInfo');
        dump($data);
    }

    public function done()
    {
        $this->viewBuilder()->layout('signup');
        $user = $this->Users->newEntity();
        $this->request->session()->write('UserInfo.uuid' , Text::uuid());
        $verifyCode = substr(Text::uuid(), 0, 32);
        $this->request->session()->write('UserInfo.email_verifying_code' , $verifyCode);
        $data = $this->request->session()->read('UserInfo');
        if($this->request->is('post')){
            $user = $this->Users->newEntity(
                $data,
                [
                    'associated' => [
                        'Profiles'
                    ],
                ]
            );
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Signup successful! Please check your email to verify your email'));
                $this->Utilities->signupConfirmEmail($data, $verifyCode);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Sorry! something went wrong'));
            }

        }
        $this->set('user' , $user);
    }

    private function sellerUser($user)
    {
        if ($user == 'agent') {
            return 1;
        } elseif ($user == 'whole_seller') {
            return 2;
        } elseif ($user == 'home_owner') {
            return 3;
        } else {
            return false;
        }
    }
}