<?php
/**
 * Created by PhpStorm.
 * User: Haroldas
 * Date: 02/04/15
 * Time: 14:25
 */

App::uses('AppController', 'Controller');
class UsersController extends AppController {

    public $uses = ['User']; // Select which model to use
    public $helpers = ['Form'];

    public function index() {
    }

    public function create () {
        if ( $this->request->is('post') ) {
            $data = $this->request->data;
            $this->User->create();
            if ($this->User->save($data)) {
                $this->Session->setFlash("User has been created");
            } else {
                $this->Session->setFlash("Unable to create user account");
            }
        }
    }

    public function login() {
        if ( $this->request->is('post') ) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function delete($id) {

    }
}
