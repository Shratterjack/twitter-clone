<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

// the Text class
use Cake\ORM\Query;
// the EventInterface class
// the Validator class
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\ORM\TableRegistry;


class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('Tweets');
        $this->hasMany('Connections');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('username')
            ->maxLength('username', 255)
            ->notEmptyString('email')
            ->maxLength('email', 255)
            ->notEmptyString('password')
            ->minLength('password', 6);

        return $validator;
    }

    public function findUserProfile(Query $query, array $options)
    {
        $query = $this->find()
            ->select(['Users.id', 'Users.username', 'Users.email', 'Users.created_date'])
            ->contain(
                ['Tweets' => [
                    'sort' => ['Tweets.tweet_date' => 'DESC'],
                ],
                ])
            ->where(['id' => $options['userId']]);

        return $query;
    }

    public function findSuggestions(Query $query, array $options)
    {   
        $users = $this->find()
            ->select(['Users.id', 'Users.username', 'Users.email', 'Users.created_date'])
            ->where(['id IS NOT' => $options['userId']]);

            // ->contain(
            //     ['Connections' => [
            //         'fields' => ['connection_id', 'user_id','recipent_id']
            //     ]
            // ])

        return $users;
    }

    public function findFollowed(Query $query, array $options)
    {   
        $connectionTable = TableRegistry::getTableLocator()->get('Connections');
        $followQuery = $connectionTable->find()
        ->select(['Connections.recipent_id'])
        ->where(['user_id IS' =>$options['userId']]);

        return $followQuery;
    }

    
}
