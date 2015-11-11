<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 06.10.2015
 * Time: 12:42
 */

namespace App\Controllers;
use App\Classes\App;
use App\Exceptions\E403Exception;
use App\Models\Clients as ModelClients;


class Adminclients
    extends AbstractController
{
    public $path;
    public $client;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/clients/';
        parent::__construct();
        if (!App::isAdmin()) {
            throw new E403Exception('403. Доступ запрещен.');
        }
    }
    public function actionDeleteNews()
    {
        $client = ModelClients::findOne($_GET['id']);

        //указываем связанные таблицы и поля в формате deleteRelatedRecords($table1, $table2, $field1, $field2)
        //$client->deleteRelatedRecords('cars','orders','client_id','cars_id');

        $sql_clients = 'DELETE FROM clients WHERE id=:id';
        $sql_orders = 'DELETE FROM orders WHERE cars_id IN (SELECT id FROM cars WHERE client_id=:id)';
        $sql_cars = 'DELETE FROM cars WHERE client_id=:id';
        $client->deleteRecords($sql_orders, $sql_cars, $sql_clients);

        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/" );
    }

    public function actionViewFormNews(){
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->view->items = ModelClients::findOne($_GET['id']);
        }
        $this->view->display('form');
    }
    public function actionSave(){
        if (isset($_POST['id_hidden']) && !empty($_POST['id_hidden'])) {
            $this->actionUpdateNews($_POST['id_hidden']);
        } else {
            $this->actionAddNews();
        }
    }
    public function actionAddNews()
    {
        $client = new ModelClients();
        $name = $_POST['name'];
        $second = $_POST['second'];
        $middle = $_POST['middle'];
        $client->name = $name;
        $client->second = $second;
        $client->middle = $middle;
        $client->phone = $_POST['phone'];
        $client->data_a = date('Y-m-d H:i:s');
        $client->insert();
       /* $send = new SendMail(); //отправка письма
        if ( $send->send()){*/
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/" );
        /*} else {
            throw new \Exception("Ошибка при отправлении письма о добавлении новости!");
        }*/
    }
    public function actionUpdateNews($id)
    {
        $client = ModelClients::findOne($id);
        $client->name = $_POST['name'];
        $client->second = $_POST['second'];
        $client->middle = $_POST['middle'];
        $client->phone = $_POST['phone'];
        $client->update();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/" );
    }



} 