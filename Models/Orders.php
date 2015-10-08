<?php
/**
 * Created by PhpStorm.
 * User: �������������
 * Date: 08.10.2015
 * Time: 11:54
 */
namespace App\Models;
use App\Classes\Model;


class Orders
    extends Model
{
    protected static $table = 'orders';

    public $engine;
    public $suspension_system;
    public $data_a;
    public $id;
}