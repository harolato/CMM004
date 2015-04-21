<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {


    public $uses = ['User','ProjectAllocation', 'TaskAllocation'];
    public $components = ['Session','Auth'];


    /**
     * This function is being executed every time you load a page
     */
    public function beforeFilter() {
        // Check if you're logged in
        if ( $this->Auth->user() ) {
            // Display array of user related data
            debug($this->ProjectAllocation->findAllByUserId($this->Auth->user('id')));
            debug($this->TaskAllocation->findAllByUserId($this->Auth->user('id')));
        }

        // Authorisation setup
        $this->Auth->loginAction = ['controller' => 'Users', 'action' => 'login'];
        $this->Auth->logoutRedirect = '/';
        $this->Auth->loginRedirect = ['controller' => 'Users', 'action' => 'index'];
        $this->Auth->authError = "Not allowed!";
        $this->Auth->authorize = ["Controller"];
        $this->Auth->authenticate = ['Form' => [
        		'passwordHasher' => [
        			'className' => 'Simple'
        		],
        		'fields' => [
        			'username' => 'id',
        			'password' => 'password'
        		]
        	]
        ];
        $this->Auth->unauthorizedRedirect = ['controller' => 'Users' , 'action' => 'index'];

        $this->Auth->allow('index', 'login');
    }

    public function isAuthorized() {
        return true;
    }

}
