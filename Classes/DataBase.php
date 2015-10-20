<?php

namespace App\Classes;

class DataBase
{
    protected $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/../Config/db.php';
        $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'];

        mysql_connect($config['host'], $config['user'], $config['password']) or die(mysql_error());
        mysql_query("CREATE DATABASE IF NOT EXISTS " .$config['dbname'] .
            " DEFAULT CHARACTER SET utf8"
        ) or die(mysql_error());

        $this->dbh = new \PDO($dsn, $config['user'], $config['password']);
        try {
            $sql_users = "CREATE TABLE IF NOT EXISTS users (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          login VARCHAR(50),
                          password VARCHAR(50),
                          access INT(6) DEFAULT 2 NOT NULL
                          )";
            $sql_cars = "CREATE TABLE IF NOT EXISTS cars (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          client_id INT(6),
                          auto_marka VARCHAR(255),
                          auto_model VARCHAR(255),
                          year INT(4),
                          volume VARCHAR(255),
                          power INT(4),
                          GUR VARCHAR(255),
                          ABS VARCHAR(255),
                          VIN VARCHAR(255),
                          data_a TIMESTAMP
                          )";
            $sql_clients = "CREATE TABLE IF NOT EXISTS clients (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255),
                          second VARCHAR(255),
                          middle VARCHAR(255),
                          phone INT(10),
                          data_a TIMESTAMP
                          )";
            $sql_orders = "CREATE TABLE IF NOT EXISTS orders (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          cars_id INT(6),
                          part TEXT,
                          article VARCHAR(255),
                          OE VARCHAR(255),
                          provider VARCHAR(255),
                          quantity INT(6),
                          price VARCHAR(255),
                          data_a TIMESTAMP
                          )";

            if ($this->dbh->exec($sql_users) === false) {
                throw new \ErrorException('ошибка создания таблицы users');
            }
            if ($this->dbh->exec($sql_cars) === false) {
                throw new \ErrorException('ошибка создания таблицы cars');
            }
            if ($this->dbh->exec($sql_clients) === false) {
                throw new \ErrorException('ошибка создания таблицы clients');
            }
            if ($this->dbh->exec($sql_orders) === false) {
                throw new \ErrorException('ошибка создания таблицы orders');
            }
        }catch (\ErrorException $e) {
            die('Error:' . $e->getMessage());
        }

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