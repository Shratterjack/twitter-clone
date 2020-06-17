<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Connection extends Entity{
    protected $_accessible = [
        '*' => false,
        'connection_id' => false,
        'sender_id' => true,
        'recipent_id' => true,
        'follow_date' => false,
    ];
}