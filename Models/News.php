<?php

namespace App\Models;
use App\Classes\Model;
class News
    extends Model
{
    protected static $table = 'news';

    public $title;
    public $text;
    public $data_a;
    public $id;
}