<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */
App::uses('Model', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class TaskAllocation extends Model {

    public $name = 'TaskAllocation';
    public $useTable = 'tasks_allocations';
    public $belongsTo = [
        'Task' => [
            'className' => 'Task',
            'foreignKey' => 'id'
        ],
        'User' => [
            'className' => 'User',
            'foreignKey' => 'id'
        ]
    ];
}