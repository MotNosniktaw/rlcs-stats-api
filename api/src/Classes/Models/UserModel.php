<?php

namespace Api\Models;

class UserModel
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function verifyLogin($user, $password)
    {
        $sql = 'SELECT `username`, `password` FROM `users` WHERE `username` = :user;';

        $query = $this->db->prepare($sql);
        $query->bindParam('user', $user);
        $query->execute();

        $credentials = $query->fetch();

        if (($user === $credentials['username']) && ($password === $credentials['password']))
        {
            return true;
        }
    }
}