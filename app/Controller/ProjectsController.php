<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/03/15
 * Time: 23:08
 */

App::uses('AppController', 'Controller');
class ProjectsController extends AppController {

    public $uses = array('Project','Task','User'); // Select which model to use

    public function index($project_id) {
        $this->set('tasks', $this->Task->findAllByProjectId($project_id));
        $this->set('projectusers', $this->Project->findAllById($project_id));
        $this->set('project_title', $this->Project->find('first',[
            'fields' => ['name','id'],
            'conditions' => [
                'id' => $project_id
            ]
        ]));
        $this->set('project_role', $this->User->ProjectsUser->findByUserIdAndProjectId($this->Auth->user('id'),$project_id));
    }

    public function create () {
        if ( $this->request->is('post') ) {
            print_r($this->request->data);
            $this->Project->save($this->request->data);
        }
    }

    public function delete($id) {
        $this->Post->delete($id);
    }
}
