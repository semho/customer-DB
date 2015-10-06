<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 06.10.2015
 * Time: 10:28
 */

namespace App\Models;
use App\Classes\Model;


class Clients
    extends Model
{
    protected static $table = 'clients';

    public $title;
    public $text;
    public $data_a;
    public $id;
} 