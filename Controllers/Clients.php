<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 06.10.2015
 * Time: 10:36
 */

namespace App\Controllers;
use App\Models\Clients as Model;

class Clients
    extends AbstractController
{
    public $path;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/clients/';
        parent::__construct();

    }
    public function actionAllShow()
    {
        $this->view->items = Model::findAll();
        $this->view->display('all');
    }
    public function actionOneShow()
    {
        $id = $_GET['id'];
        $this->view->items = Model::findOne($id);
        $this->view->display('article');
    }
} 