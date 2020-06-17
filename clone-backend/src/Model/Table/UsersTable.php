<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

// the Text class
use Cake\ORM\Table;
// the EventInterface class
// the Validator class
use Cake\Validation\Validator;

use Cake\ORM\Query;


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

    public function findUserProfile(Query $query,array $options)
    {
        $query = $this->find()
            ->select(['Users.id', 'Users.username', 'Users.email', 'Users.created_date'])
            ->contain(
                ['Tweets' => [
                    'sort' => ['Tweets.tweet_date' => 'DESC'],
                ]
            ])
            ->where(['id' => $options['userId']]);

        return $query;
    }
}
