<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 07.10.2015
 * Time: 13:02
 */

namespace App\Controllers;
use App\Classes\App;
use App\Exceptions\E403Exception;
use App\Models\Orders as ModelOrders;

class AdminOrders
    extends AbstractController
{
    public $path;
    public $order;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/orders/';
        parent::__construct();
        if (!App::isAdmin()) {
            throw new E403Exception('403. Доступ запрещен.');
        }
    }
    public function actionDeleteOrders()
    {
        $order = ModelOrders::findOne($_GET['id']);
        $order->delete();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/orders/AllShowOrders?id=".$order->cars_id );
    }
    public function actionViewFormOrders(){
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->view->items = ModelOrders::findOne($_GET['id']);
        }
        $this->view->display('form');
    }
    public function actionSave(){
        if (isset($_POST['id_hidden']) && !empty($_POST['id_hidden'])) {
            $this->actionUpdateOrders($_POST['id_hidden']);
        } else {
            $this->actionAddOrders();
        }
    }
    public function actionUpdateOrders($id)
    {
        $order = ModelOrders::findOne($id);
        $order->engine = $_POST['engine'];
        $order->suspension_system = $_POST['suspension_system'];
        $order->update();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/orders/AllShowOrders?id=" .$order->cars_id );
    }
    public function actionAddOrders()
    {
        $order = new ModelOrders();
        $order->engine = $_POST['engine'];
        $order->suspension_system = $_POST['suspension_system'];
        $order->cars_id = $_POST['cars_id_hidden'];
        $order->data_a = date('Y-m-d h:i:s');
        $order->insert();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/orders/AllShowOrders?id=" . $_POST['cars_id_hidden'] );
    }
} 