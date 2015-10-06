<?php

namespace App\Classes;

class DataBase
{
    protected $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/../Config/db.php';
        $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'];
        $this->dbh = new \PDO($dsn, $config['user'], $config['password']);
    }
    //возвращает массив записей
    public function findAll($class, $sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        return $res;
    }
    //ввозвращает одну запись
    public function findOne($class, $sql, $params = [])
    {
        return $this->findAll($class, $sql, $params)[0];
    }
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
    public function getId()
    {
        return $this->dbh->lastInsertId();
    }

}