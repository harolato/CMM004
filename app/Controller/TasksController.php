<?php
/**
 * Created by PhpStorm.
 * User: zen
 * Date: 2015-03-31
 * Time: 11:32
 */

class TasksController extends AppController {

    public function add($id, $project_id, $name, $description, $points, $state, $iteration_id) {
        $currentDate = date('Y-m-d H:i:s');

        $taskData = array (
            'Task' => array (
                'id' => $id,
                'project_id' => $project_id,
                'name' => $name,
                'description' => $description,
                'points' => $points,
                'state' => $state,
                'date_added' => $currentDate,
                'date_completed' => null,
                'iteration_id' => $iteration_id
            )
        );

        $this->Task->save($taskData);
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

    public function remove() {
        $id = $this->request->data['Task']['id'];

        if ($id != NULL) {
            $this->Task->delete($id);
        }
    }
}