<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */
App::uses('Model', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends Model {

    public $name = 'User';
    public $primaryKey = 'id';
    public $hasAndBelongsToMany = [
      'Task' => [
          'className' => 'Task',
          'joinTable' => 'tasks_users',
          'foreignKey' => 'user_id',
          'associationForeignKey' => 'task_id',
          'unique' => true
      ],
        'Project' => [
            'className' => 'Project',
            'joinTable' => 'projects_users',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'project_id',
            'unique' => true
        ]
    ];

    public function beforeSave($options = array()) {
        // Encrypt password with built-in password hasher.
        if (isset($this->data[$this->alias]['password'])) {
            // load the object
            $passwordHasher = new SimplePasswordHasher();
            // Hash password
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
            // $this->data variable is sent to the next step of $this->Model->save() operation.
        }
        return true;
    }

}