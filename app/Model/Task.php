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

}