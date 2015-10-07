<?php
/**
 * Created by PhpStorm.
 * User: �������������
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
    public $article;
    public  function __construct()
    {
        //���� �� ����� ��������
        $this->path = __DIR__ . '/../Views/clients/';
        parent::__construct();
        if (!App::isAdmin()) {
            throw new E403Exception('403. ������ ��������.');
        }
    }

} 