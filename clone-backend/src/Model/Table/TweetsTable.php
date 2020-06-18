<?php

// src/Model/Table/TweetsTable.php
namespace App\Model\Table;

// the EventInterface class
use Cake\Event\EventInterface;

use Cake\ORM\Table;
// the Validator class
use Cake\Validation\Validator;

use Cake\ORM\TableRegistry;

use Cake\ORM\Query;


class TweetsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
 
        $this->setPrimaryKey('tweet_id');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'tweet_date' => 'new',
                ]
            ]
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('tweet')
            ->maxLength('username', 150)
            ->notEmptyString('user_id');

        return $validator;
    }

    // fetches the tweets of the other users followed 
    public function findFollowerTweets(Query $query,array $options){
        $connectionTable = TableRegistry::getTableLocator()->get('Connections');
        $subquery = $connectionTable->find()
        ->select(['Connections.recipent_id'])
        ->where(['user_id IS' =>$options['userId']]);


        $query = $this->find()
        ->select(['Tweets.tweet_id','Tweets.tweet','Users.email'])
        ->contain(['Users'])
        ->where(['id IN' => $subquery])
        ->order(['Tweets.tweet_date' => 'DESC']);

        return $query;
    }
}
