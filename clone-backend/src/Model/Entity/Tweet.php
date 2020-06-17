<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Tweet extends Entity{
    protected $_accessible = [
    '*' => false,
    'tweet_id' => false,
    'tweet' => true,
    'user_id' => true,
    'tweet_date' => false,
    ];
}