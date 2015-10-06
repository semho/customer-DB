<?php

namespace App\Models;
use App\Classes\Model;

class User
    extends Model
{
    protected static $table = 'users';

    public $login;
    public $password;
    public $access;
    public $id;


    public function saveSession()
    {
        $_SESSION['user']['id'] = $this->id;
        $_SESSION['user']['login'] = $this->login;
    }

    /*public function getUserByID($id) {

        $this->id = $id;
        $res = User::findOne($this->id);
        $this->login = $res->login;
        $this->access = $res->access;

        return true;
    }
    public function loadSession()
    {
        if($_SESSION['user']['id'] > 0) {

            $this->getUserByID($_SESSION['user']['id']);
            return true;
        }
        return false;
    }
    public function isAdmin() {
       return ($this->access == 1);
    }
    */

}