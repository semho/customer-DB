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
        $id = $_GET['id'];
        $this->view->items = Model::findAllUserId($id);
        $this->view->display('cars_client');
    }
} 