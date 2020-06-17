<?php

// src/Model/Table/TweetsTable.php
namespace App\Model\Table;

// the Text class
use Cake\ORM\Table;
// the EventInterface class
// the Validator class
use Cake\Validation\Validator;

class ConnectionsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsToMany('Users', [
            'className' => 'Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
            
        $this->setPrimaryKey('connection_id');
        
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'connection_date' => 'new',
                ],
            ],
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('user_id')
            ->notEmptyString('recipent_id');

        return $validator;
    }
}
