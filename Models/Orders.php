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

    public $cars_id;
    public $part;
    public $article;
    public $OE;
    public $provider;
    public $quantity;
    public $price;
    public $data_a;
    public $id;
}