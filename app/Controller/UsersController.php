<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */

App::uses('AppController', 'Controller');
class UsersController extends AppController {

    public $uses = ['User']; // Select which model to use
    public $helpers = ['Form']; // List of helpers we will use


    /**
     *    Default action of the Users controller
     */
    public function index() {

    }
    /**
     *   Create user action
     */
    public function create () {
        // Check if we have POST request
        if ( $this->request->is('post') ) {
            $data = $this->request->data;
            // Create empty user object
            $this->User->create();
            // Try to save user into database
            if ($this->User->save($data)) {
                $this->Session->setFlash("User has been created");
            } else { // If unable to save user, display message
                $this->Session->setFlash("Unable to create user account");
            }
        } // Otherwise display create user form /View/Users/create.ctp
    }
    /**
     *   login action
     */
    public function login() {
        if ( $this->request->is('post') ) {
            // Try to log user in
            if ($this->Auth->login()) {
                // if successful redirect to restricted zone
                $this->Session->setFlash(__('Logged in!'));
                return $this->redirect($this->Auth->redirectUrl());
            }
            // Otherwise display error message
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
        // Display login form /View/Users/login.ctp
    }
    /**
     *   logout action
     */
    public function logout() {
        // Redirect to landing page after log out
        return $this->redirect($this->Auth->logout());
    }
    /**
     *   Delete user action
     */
    public function delete($id) {
        // Fetch user ID from url $id.
    }
}
