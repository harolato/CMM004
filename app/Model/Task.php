<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */
App::uses('Model', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class Task extends Model {

    public $name = 'Task';

    public $hasAndBelongsToMany = [
        'User' => [
            'className' => 'User',
            'joinTable' => 'tasks_users',
            'foreignKey' => 'task_id',
            'associationForeignKey' => 'user_id',
            'unique' => true
        ]
    ];

    public function getUserTasks($user_id) {

    }

    public function getProjectTasks($project_id) {
        $data = $this->find('all',[
           'conditions' => '`Task`.`project_id` = ' . $project_id,
            'joins' => [
                [
                    'alias' => 'Allocation',
                    'table' => 'tasks_allocations',
                    'type' => 'LEFT',
                    'conditions' => '`Allocation`.`task_id` = `Task`.`id`'
                ],
                [
                    'alias' => 'User',
                    'table' => 'users',
                    'type' => 'LEFT',
                    'conditions' => '`User`.`id` = `Allocation`.`user_id`'
                ]

            ]
        ]);
        return $data;
    }

}