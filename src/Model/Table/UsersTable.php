<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Profiles
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Profiles', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add(
                'username',
                [
                    'validEmail' => [
                        'rule' => ['email'],
                        'message' => 'Please provide valid email address!'
                    ],
                    'unique' => [
                        'message' => 'Sorry, this email address is already taken!',
                        'provider' => 'table',
                        'rule' => 'validateUnique'
                    ]
                ]
            )
            ->requirePresence('username', 'create', 'Email address must be required!')
            ->notEmpty('username', 'Email address must be required!');


        $validator
            ->add(
                'password',
                [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'message' => 'Password must contain at least 6 character'
                    ],
                ]
            )
            ->requirePresence('password', 'create', 'Password must be required!')
            ->notEmpty('password', 'Password must be required!');

        $validator
            ->add(
                'cPassword', [
                    'custom' => [
                        'rule' =>
                            function ($value, $context) {
                                if (isset($context['data']['password']) && $value == $context['data']['password']) {
                                    return true;
                                }
                                return false;
                            },
                        'message' => 'Sorry, password and confirm password does not matched'

                    ],
                ]
            )
            ->notEmpty('cPassword', 'Confirm password must be required!');


/*        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role', 'Account type must be required!');*/

        return $validator;
    }


    public function validationResetPassword(Validator $validator)
    {
        $validator
            ->add(
                'password',
                [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'message' => 'Password must contain at least 6 character'
                    ],
                ]
            )
            ->requirePresence('password', 'create', 'Password must be required!')
            ->notEmpty('password', 'Password must be required!');

        $validator
            ->requirePresence('cPassword', 'create', 'Password must be required!')
            ->notEmpty('cPassword', 'Confirm password must be required!', 'create')
            ->add(
                'cPassword',
                'custom',
                [
                    'rule' => function ($value, $context) {

                        if (isset($context['data']['password']) && $value == $context['data']['password']) {
                            return true;
                        }
                        return false;
                    },
                    'message' => 'Sorry, password and confirm password does not matched'
                ]
            );

        return $validator;
    }


    public function validationChangePassword(Validator $validator)
    {
        $validator
            ->add(
                'new_password',
                [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'message' => 'Password must contain at least 6 character'
                    ],
                ]
            )
            ->requirePresence('new_password', 'create', 'Password must be required!')
            ->notEmpty('new_password', 'Password must be required!');

        $validator
            ->add(
                'new_cPassword', [
                    'custom' => [
                        'rule' =>
                            function ($value, $context) {
                                if (isset($context['data']['new_password']) && $value == $context['data']['new_password']) {
                                    return true;
                                }
                                return false;
                            },
                        'message' => 'Sorry, password and confirm password does not matched'

                    ],
                ]
            )
            ->notEmpty('new_cPassword', 'Confirm password must be required!');

        $validator
            ->notEmpty('current_password' ,  'Current password must be required!')
            ->add('current_password', 'custom', [
                'rule' =>

                    function ($value, $context) {
                        $query = $this->find()
                            ->where([
                                'id' => $context['data']['id']
                            ])
                            ->first();

                        $data = $query->toArray();

                        return (new DefaultPasswordHasher)->check($value, $data['password']);
                    },
                'message' => 'Current password is incorrect!'
            ]);


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        return $rules;
    }

    public function getIDbyUUID($uuid)
    {
        $result = $this->find()
            ->where(['Users.uuid' => $uuid])
            ->first();

        if ($result) {
            return $result->id;
        }
        return null;
    }

    public function getUserByID($id)
    {
        $result = $this->find()
            ->select()
            ->where(['Users.id' => $id])
            ->contain('Profiles')
            ->first();

        if ($result) {
            return $result;
        }
        return null;
    }

    public function getUserByEmailCode($code)
    {
        $result = $this->find()
            ->where(['Users.email_verifying_code' => $code])
            ->contain('Profiles')
            ->first();

        if ($result) {
            return $result;
        }
        return null;
    }

    public function getUserByForgotCode($code)
    {
        $result = $this->find()
            ->where(['Users.forgot_pass_code' => $code])
            ->contain('Profiles')
            ->first();

        if ($result) {
            return $result;
        }
        return null;
    }

    public function getUserByEmail($email)
    {
        $result = $this->find()
            ->where(['Users.username' => $email])
            ->contain('Profiles')
            ->first();

        if ($result) {
            return $result;
        }
        return null;
    }

    public function getUserIDByEmail($email)
    {
        $result = $this->find()
            ->where(['Users.username' => $email])
            ->contain('Profiles')
            ->select('id')
            ->first();

        if ($result) {
            return $result;
        }
        return null;
    }

    /**
     * @return array
     */
    public function userOverview()
    {
        $query = $this->find();
        $query->select(
            [
                'count' => $query->func()->count('*'),
                'roleName' => $query->newExpr()
                    ->addCase(
                        [
                            $query->newExpr()->eq('role', 1),
                            $query->newExpr()->eq('role', 2),
                            $query->newExpr()->eq('role', 3),
                        ],
                        ['admin', 'seller', 'investor'], # values matching conditions
                        ['string', 'string', 'string'] # type of each value
                    )
            ]
        );
        $query->group('role');
        return $query->toArray();
    }


    public function totalUser()
    {
        $query = $this->find()->count();
        return $query;
    }



    public function getList()
    {
        $users = [];
        $query = $this->find();
        $query->select(['id', 'username']);
        $query->contain(
            [
                'Profiles' => [
                    'fields' => ['id', 'first_name', 'last_name']
                ]
            ]
        );
        $data = $query->toArray();
        foreach($data as $user)
        {
            $users[] = $user['profile']['first_name'].' '.$user['profile']['last_name'].' ('.$user['username'].')';
        }

        return $users;
    }

    public function getAdminsIds(){
        $ids = [];
        $users = $this->find('all', ['conditions' => ['Users.role' => 1]]);
        foreach($users as $user)
        {
            $ids[] = $user->id;
        }

        return $ids;
    }
}
