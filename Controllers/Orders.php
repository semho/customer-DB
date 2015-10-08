<?php
/**
 * Created by PhpStorm.
 * User: �������������
 * Date: 08.10.2015
 * Time: 12:04
 */

namespace App\Controllers;
use App\Models\Orders as Model;

class Orders
    extends AbstractController
{
    public $path;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/orders/';
        parent::__construct();
    }
    public function actionAllShowOrders()
    {
        //связь таблиц cars и orders по id(cars) и cars_id(orders)
        $id = $_GET['id'];
        $field = 'cars_id';
        $this->view->items = Model::findAllUserId($id, $field);
        $this->view->display('order_car');
    }
} 