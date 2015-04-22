<?php
/**
 * Created by PhpStorm.
 * User: Bart Wlizlo
 * Date: 2015-03-31
 * Time: 11:32
 */

class TasksController extends AppController {

    /**
     * @param $id
     * @param $project_id
     * @param $name
     * @param $description
     * @param $points
     * @param $state
     * @param $iteration_id
     */
    public function add($project_id) {
        if ( $this->request->is('post') ) {
            $currentDate = date('Y-m-d H:i:s');
            $data = $this->request->data;
            $data['Task']['project_id'] = $project_id;
            $data['Task']['date_added'] = $currentDate;
            $this->Task->save($data);
        }
    }


    public function display() {

        $id = $this->request->data['Task']['id'];

        $theTask = $this->Task->find('first', array(
                'conditions' => array(
                    'id' => $id)
            )
        );

        if ($theTask != NULL) {
            $this->set('id', $theTask['id']);
            $this->set('project_id', $theTask['project_id']);
            $this->set('name', $theTask['name']);
            $this->set('description', $theTask['description']);
            $this->set('points', $theTask['points']);
            $this->set('state', $theTask['state']);
            $this->set('date_added', $theTask['date_added']);
            $this->set('date_completed', $theTask['date_completed']);
            $this->set('iteration_id', $theTask['iteration_id']);
        }
    }

    public function displayAll() {
        $taskSet = $this->Task->find('all');

        foreach ($taskSet as &$task) {
            $this->set('task' . $task['id'], $task); // returns each task as a array

            // return every task field as separate variable (var name = field_name + task_id)
            //foreach ($task as $key=>$value) {
            //    $this->set($key.$task['id'], $value);
            //}
        }
    }

    public function update() {
        $taskData = $this->request->data['Task'];
        $this->Task->save($taskData);
    }

    public function signOffTask( $task_id ) {
        $data['Task']['id'] = $task_id;
        $data['Task']['state'] = 'complete';
        $data['Task']['date_completed'] = date('Y-m-d H:i:s');
        $this->Task->save($data);
    }

    public function writeNote( $allocation_id ) {

        if ( $this->request->is('post') ) {
            $data['TasksUser']['id'] = $allocation_id;
            $data['TasksUser']['notes'] = $this->request->data['TasksUser']['notes'];
            $this->Task->TasksUser->save(data);
        } else {
            $this->data = $this->Task->TasksUser->find('first', [
                'conditions' => [
                    'id' => $allocation_id
                ]
            ]);
        }
    }

    public function remove($task_id) {
        if ($task_id != NULL) {
            $this->Task->delete($task_id);
        }
    }

    public function assign($task_id, $user_id) {
        $data['User']['id'] = $user_id;
        $data['Task']['id'] = $task_id;
        return $this->Task->save($data);
    }
    public function unassign($allocation_id) {
        return $this->Task->TasksUser->delete($allocation_id,false);
    }
}