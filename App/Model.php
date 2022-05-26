<?php

namespace App;

use App\Exeptions\DbExeption;
use App\Exeptions\Error404Exeption;
use App\Exeptions\MultiExeption;

abstract class Model
{

    protected const TABLE = '';
    public int $id;

    /**
     * @return array // returns array of objects from the table
     */
    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        $data = $db->query($sql, [], static::class);
        return $data;
    }

    /**
     * @return \Generator
     */
    public static function findAllGenerator() :\Generator
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->queryEach($sql, [], static::class);

    }

    /**
     * @param $id // id of the table row
     * @return mixed|void // row of the table
     */
    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);
        if ($data == true) {
            return $data[0];
        } else {
            throw new Error404Exeption('Ошибка 404 - не найдено');
        }
    }

    /**
     * @return void
     */
    public function insert()
    {
        $props = [];
        $binds = [];
        $data = [];

        foreach (get_object_vars($this) as $prop => $value) {
            $props[] = $prop;
            $binds[] = ':' . $prop;
            $data[':' . $prop] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $props) . ') 
        VALUES (' . implode(', ', $binds) . ')';

         $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();

    }

    public function update()
    {
        $props = [];
        $data = [];
        foreach (get_object_vars($this) as $prop => $value) {
            $props[] = $prop . ' = ' . ':' . $prop;
            $data[':' . $prop] = $value;
        }
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $props) . ' WHERE id = :id';
        $db = new Db();
        $db->execute($sql, $data);

    }

    public function delete(): bool
    {

        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = new Db();
        return $db->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else $this->insert();
    }

    public function fill(array $data)
    {
        $errors = new MultiExeption();

        foreach ($data as $key => $value) {
            $keyArg = explode('_', $key);

            $methodName = '';
            foreach ($keyArg as $keyName) {
                $methodName .= ucfirst($keyName);
            }
            $validName = 'validate' . $methodName;

            $validator = new Validator();
            if (method_exists($validator, $validName)) {
                try {
                    if ($validator->$validName($value)) {
                        $this->$key = $value;
                    }
                } catch (\Exception $e) {
                    $errors->add($e);
                    ErrorLogger::addError($e);
                }
            }
        }
        if (count($errors->getAll()) > 0) {
            throw $errors;
        }

    }
}