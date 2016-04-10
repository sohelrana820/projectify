<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Database\Type;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Utility\Text;

Time::$defaultLocale = 'en_US';
Time::setToStringFormat('MMM d, Y h:mm a');

Type::build('datetime')->useLocaleParser();

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

    public $userID;

    public $loggedInUser;

    public $appsName = 'Strastic';

    public $baseUrl = 'http://localhost/strastic';

    public $emailFrom = 'info@strastic.com';

    public $currentTheme = 'FlatAdmin';

    public $paginationLimit = 10;

    public $featuredLimit = 6;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Utilities');
        $this->loadComponent(
            'Auth',
            [
                'loginRedirect' => [
                    'controller' => 'Dashboard',
                    'action' => 'index'
                ],
                'logoutRedirect' => [
                    'controller' => 'Users',
                    'action' => 'login',
                ]
            ]
        );
        $this->loadModel('Users');
    }

    public function beforeFilter(Event $event)
    {
        $this->viewBuilder()
            ->layout('application')
            ->theme($this->currentTheme);

        $this->Auth->allow(
            [
                'signup',
                'verifyEmail',
                'forgotPassword',
                'resetPassword',
                'start',
                'termsAndConditions',
                'sellerType',
                'investor',
                'agent',
                'wholeSeller',
                'homeOwner',
                'complete',
                'done'
            ]
        );
        $this->userID = $this->Auth->user('id');
        $this->loggedInUser = $this->Users->getUserByID($this->userID);

        $this->set('title', $this->appsName);
        $this->set('appsName', $this->appsName);
        $this->set('loggedInUser', $this->loggedInUser);
    }


    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);

        }

    }

    public function checkAuthentication()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->referer());
        }
    }

    public function getDomain()
    {
        return $this->baseUrl = "http://" . $_SERVER['HTTP_HOST'];
    }

    public function getIpAddress()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        return $ip;
    }
}
