<?php
/**
 * Created by PhpStorm.
 * User: �������������
 * Date: 06.10.2015
 * Time: 10:28
 */

namespace App\Models;
use App\Classes\Model;


class Cars
    extends Model
{
    protected static $table = 'cars';

    public $client_id;
    public $auto_marka;
    public $auto_model;
    public $VIN;
    public $data_a;
    public $id;
} 