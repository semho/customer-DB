<?php

namespace App\Classes;
use App\Exceptions\E404Exception;
abstract class Model
{

    protected static    $table;

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
    public static function findAllUserId($id, $field)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' .static::getTable() . ' WHERE '.$field.'=:id';
        $db = new DataBase();
        $res = $db->findAll($class, $sql, [':id' => $id]);
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

    public function deleteRecords($sql_orders, $sql_cars, $sql_clients = NULL)
    {
        $db = new DataBase();
        if ($sql_clients != NULL) {
            $res_clients = $db->execute($sql_clients,  [':id' => $this->id]);
        }
        $res_orders = $db->execute($sql_orders,  [':id' => $this->id]);
        $res_cars = $db->execute($sql_cars,  [':id' => $this->id]);
        return $res_clients . $res_orders . $res_cars;
    }
    //удаляет все связаные по id($field) записи из таблиц($table) переданых в аргуметах метода
    /*public function deleteRelatedRecords($table1, $table2, $field1, $field2)
    {
        $sql_1 = 'DELETE ' .static::getTable() . ','.$table1.','.$table2.' FROM ' .static::getTable() . ','.$table1.','.$table2.' WHERE ' .static::getTable() . '.id=:id AND '.$table1.'.'.$field1.'=:id AND '.$table2.'.'.$field2.'='.$table1.'.id';
        $sql_2 = 'DELETE FROM ' .$table1 . ' WHERE '.$field1.'=:id';
        $sql = 'DELETE FROM ' .static::getTable() . ' WHERE id=:id';

        $db = new DataBase();
        $res_1 =  $db->execute($sql_1,  [':id' => $this->id]);
        $res_2 =  $db->execute($sql_2,  [':id' => $this->id]);
        $res = $db->execute($sql,  [':id' => $this->id]);
        return $res_1 .$res_2. $res ;
    }
    public function deleteRelatedThreeRecords($tables, $fields)
      {

          $sql = 'DELETE ' .static::getTable() . ','.$tables[0].','.$tables[1].' FROM ' .static::getTable() . ','.$tables[0].','.$tables[1].' WHERE ' .static::getTable() . '.id=:id AND '.$tables[0].'.'.$fields[0].'=:id AND '.$tables[1].'.'.$fields[1].'='.$tables[0].'.id';
          $db = new DataBase();
          return $db->execute($sql,  [':id' => $this->id]);
      }*/
    public function getLogin($login, $password)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE login=:login AND password=:password';
        $db = new DataBase();
        $res = $db->findOne($class, $sql, [':login' => $login, ':password' => $password]);
        return $res;
    }

}