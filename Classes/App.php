<?php

namespace App\Classes;

class App
{
    public static function getCurrentUser($id)
    {
        $class = static::class;
        $sql = 'SELECT * FROM users WHERE id=:id';
        $db = new DataBase();
        $res = $db->findOne($class, $sql, [':id' => $id]);
        return $res;
    }
    public static function isAdmin()
    {
        $access = App::getCurrentUser($_SESSION['user']['id'])->access;
        return ($access == 1);
    }
} 