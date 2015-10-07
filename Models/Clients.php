<?php
/**
 * Created by PhpStorm.
 * User: �������������
 * Date: 06.10.2015
 * Time: 10:28
 */

namespace App\Models;
use App\Classes\Model;


class Clients
    extends Model
{
    protected static $table = 'clients';

    public $name;
    public $second;
    public $middle;
    public $data_a;
    public $id;
} 