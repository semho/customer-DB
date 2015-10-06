<?php

namespace App\Controllers;
use App\Classes\App;
use App\Classes\SendMail;
use App\Exceptions\E403Exception;
use App\Models\News as ModelNews;

class Admin
    extends AbstractController
{
    public $path;
    public $article;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/news/';
        parent::__construct();
        if (!App::isAdmin()) {
            throw new E403Exception('403. Доступ запрещен.');
        }
    }
    public function actionSave(){
        if (isset($_POST['id_hidden']) && !empty($_POST['id_hidden'])) {
            $this->actionUpdateNews($_POST['id_hidden']);
        } else {
            $this->actionAddNews();
        }
    }
    public function actionViewFormNews(){
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->view->items = ModelNews::findOne($_GET['id']);
        }
        $this->view->display('form');
    }
    public function actionAddNews()
    {
        $article = new ModelNews();
        $title = $_POST['title'];
        $text = $_POST['text'];
        $article->title = $title;
        $article->text = $text;
        $article->insert();
        $send = new SendMail();
        if ( $send->send()){
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/" );
        } else {
            throw new \Exception("Ошибка при отправлении письма о добавлении новости!");
        }
    }
   public function actionUpdateNews($id)
    {
        $article = ModelNews::findOne($id);
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->update();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/" );
    }
    public function actionDeleteNews()
    {
        $article = ModelNews::findOne($_GET['id']);
        $article->delete();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/" );
    }

}