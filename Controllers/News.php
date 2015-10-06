<?php

namespace App\Controllers;
use App\Classes\App;
use App\Models\News as Model;
class News
    extends AbstractController
{
    public $path;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/news/';
        parent::__construct();

    }
    public function actionAllShow()
    {
        $this->view->items = Model::findAll();
        $this->view->display('all');

        //Пример работы шаблонизатора Twig
        /*$items = Model::findAll();
        $isAdmin = App::isAdmin();
        $login = $_SESSION['user']['login'];
        echo $this->twig->render('all.html', array (
            'items' => $items,
            'login' => $login,
            'isAdmin' => $isAdmin
        ));*/
    }
    public function actionOneShow()
    {
        $id = $_GET['id'];
        $this->view->items = Model::findOne($id);
        $this->view->display('article');
    }
}