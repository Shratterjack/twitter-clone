<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        '*' => false,
        'id' => false,
        'username' => true,
        'email' => true,
        'password' => true,
        'created_date' => false,
    ];
}
