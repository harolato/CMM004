<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */
App::uses('Model', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class Project extends Model {

    public $name = 'Project';

    public $belongsTo = [
        'Projects_allocations' => [
            'className' => 'ProjectAllocation',
            'foreignKey' => 'project_id'
        ]
    ];

}