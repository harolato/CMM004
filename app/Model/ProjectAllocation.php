<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */
App::uses('Model', 'Model','User', 'Project');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class ProjectAllocation extends Model {

    public $name = 'ProjectAllocation';
    public $useTable = 'projects_allocations';
    public $belongsTo = [
        'Project' => [
            'className' => 'Project',
            'foreignKey' => 'id'
        ]
    ];
}