<?php

namespace App\Classes;
use App\Exceptions\E404Exception;
abstract class Model
{

    protected static $table;

    public $id;

    public static function getTable()
    {
        return static::$table;
    }
    public static function findAll()
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' .static::getTable();
        $db = new DataBase();
        return $db->findAll($class, $sql);
    }
    public static function findOne($id)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' .static::getTable() . ' WHERE id=:id';
        $db = new DataBase();
        $res = $db->findOne($class, $sql, [':id' => $id]);
        if ($res){
            return $res;
        } else {
            throw new E404Exception('404. Не найдено.');
        }
    }
    public function insert()
    {
        $properties = get_object_vars($this);
        unset($properties['id'], $properties['access']);
        $columns = array_keys($properties);
        $places = [];
        $data = [];
        foreach ($columns as $property) {
            $places[] = ':' . $property;
            $data[':' . $property] = $this->$property;
        }
        $sql = 'INSERT INTO ' . static::getTable() . '
                (' . implode(', ', $columns) . ')
                VALUES
                (' . implode(', ', $places) . ')
                ';
        $db = new DataBase();
        $db->execute($sql, $data);
        return $this->id = $db->getId();
    }
    public function update()
    {
        $properties = get_object_vars($this);
        $columns = array_keys($properties);
        foreach ($columns as $property) {
            $data[':' . $property] = $this->$property;
            $places[] = $property . '=:' .$property;
        }
        $deleteLastElement = array_pop($places);
        $sql = 'UPDATE ' . static::getTable() . '
                SET ' . implode(', ', $places) . '
                WHERE id=:id';
        $db = new DataBase();
        return $db->execute($sql, $data);
    }
    public function delete()
    {
        $sql = 'DELETE FROM ' .static::getTable() . ' WHERE id=:id';
        $db = new DataBase();
        return $db->execute($sql,  [':id' => $this->id]);
    }
    public function getLogin($login, $password)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE login=:login AND password=:password';
        $db = new DataBase();
        $res = $db->findOne($class, $sql, [':login' => $login, ':password' => $password]);
        return $res;
    }

}