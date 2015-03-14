<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/03/15
 * Time: 23:08
 */

App::uses('AppController', 'Controller');
class PostsController extends AppController {

    public $uses = array('Post'); // Select which model to use

    public function index() {
        $data = $this->Post->find('all');
        $this->set('data', $data);
    }

    public function create () {
        if ( $this->request->is('post') ) {
            print_r($this->request->data);
            $this->Post->save($this->request->data);
        }
    }

    public function delete($id) {
        $this->Post->delete($id);
    }
}
