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
use App\Models\Cars as ModelCars;

class AdminCars
    extends AbstractController
{
    public $path;
    public $car;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/cars/';
        parent::__construct();
        if (!App::isAdmin()) {
            throw new E403Exception('403. Доступ запрещен.');
        }
    }
    public function actionDeleteCars()
    {
        $car = ModelCars::findOne($_GET['id']);
        //указываем связанные таблицы и поля в формате deleteRelatedRecords($table1, $table2, $field1, $field2)
        //$car->deleteRelatedRecords('orders', 'NULL', 'cars_id', 'NULL');

        $sql_cars = 'DELETE FROM cars WHERE id=:id';
        $sql_orders = 'DELETE FROM orders WHERE cars_id=:id';
        $car->deleteRecords($sql_orders, $sql_cars);
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/cars/AllShowCars?id=".$car->client_id );
    }
    public function actionViewFormCars(){
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->view->items = ModelCars::findOne($_GET['id']);
        }
        $this->view->display('form');
    }
    public function actionSave(){
        if (isset($_POST['id_hidden']) && !empty($_POST['id_hidden'])) {
            $this->actionUpdateCars($_POST['id_hidden']);
        } else {
            $this->actionAddCars();
        }
    }
    public function actionUpdateCars($id)
    {
        $car = ModelCars::findOne($id);
        $car->auto_marka = $_POST['auto_marka'];
        $car->auto_model = $_POST['auto_model'];
        $car->year = $_POST['year'];
        $car->volume = $_POST['volume'];
        $car->power = $_POST['power'];
        $car->GUR = $_POST['gur'];
        $car->ABS = $_POST['abs'];
        $car->VIN = $_POST['vin'];
        $car->update();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/cars/AllShowCars?id=" .$car->client_id );
    }
    public function actionAddCars()
    {
        $car = new ModelCars();
        $car->auto_marka = $_POST['auto_marka'];
        $car->auto_model = $_POST['auto_model'];
        $car->year = $_POST['year'];
        $car->volume = $_POST['volume'];
        $car->power = $_POST['power'];
        $car->GUR = $_POST['gur'];
        $car->ABS = $_POST['abs'];
        $car->VIN = $_POST['vin'];
        $car->client_id = $_POST['client_id_hidden'];
        $car->data_a = date('Y-m-d H:i:s');
        $car->insert();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/cars/AllShowCars?id=" . $_POST['client_id_hidden'] );
    }
} 