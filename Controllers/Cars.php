<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 07.10.2015
 * Time: 12:35
 */

namespace App\Controllers;
use App\Models\Cars as Model;


class Cars
    extends AbstractController
{
    public $path;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/cars/';
        parent::__construct();
    }
    public function actionAllShowCars()
    {
        // связь таблиц clients и cars по id(clients) и client_id(cars)
        $id = $_GET['id'];
        $field = 'client_id';
        $this->view->items = Model::findAllUserId($id, $field);
        $this->view->display('cars_client');
    }
} 