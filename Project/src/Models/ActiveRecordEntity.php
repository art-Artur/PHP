<?php
namespace src\Models;
use src\Services\Db;

abstract class ActiveRecordEntity{
    protected $id;

    public function __set($key, $value){
        $property = $this->formatToCamelcase($key);
        $this->$property = $value;
    }

    private function formatToCamelcase($key){
        return lcfirst(str_replace('_', '', ucwords($key,'_')));
    }

    private function formatToBd($key) {
        return strtolower(preg_replace('/([A-Z])/', '_$1', $key));
    }
    
    public function getId()
    {
        return $this->id;
    }

    public static function findAll(): ?array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'`';
        // var_dump($sql);
        return $db->query($sql,[],static::class);
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`='.$id;
        $result = $db->query($sql, [], static::class);
        return $result ? $result[0] : null;
    }

    public function save(){
        // var_dump($this->getPropertyToDB());
        if ($this->getId()) $this->update();
        else $this->insert();
    }

    private function insert() {
        $db = Db::getInstance();
        $nameField = [];
        $params = [];
        $paramsToValue = [];
        $fieldAndValue = array_filter($this->getPropertyToDB());
        // var_dump($fieldAndValue);
        foreach ($fieldAndValue as $field => $value) {
            $nameField[] = '`'.$field.'`';
            $param = ':'.$field;
            $params[] = $param;
            $paramsToValue[$param] = $value;
        }
        $sql = 'INSERT INTO `'.static::getTableName().'`
                ('.implode(',', $nameField).') 
                VALUES ('.implode(',', $params).')';
        // var_dump($sql);
        $db->query($sql, $paramsToValue, static::class);
    }

    private function update() {
        $db = Db::getInstance();
        $data = $this->getPropertyToDB();
        $params = [];
        $paramsAndValue = [];
        foreach ($data as $property => $value) {
            $param = ':'.$property;
            $params[] = '`'.$property.'`='.$param;
            $paramsAndValue[$param] = $value;
        }
        $sql = 'UPDATE `'.static::getTableName().'` 
                SET '.implode(',', $params).' WHERE `id`=:id';
        $db->query($sql, $paramsAndValue, static::class);
    }

    public function delete() {
        $db = Db::getInstance();
        $sql = 'DELETE FROM `'.static::getTableName().'` WHERE `id`=:id';
        $db->query($sql, [':id'=>$this->id], static::class);
    }

    private function getPropertyToDB():array{
        $nameAndValue = [];
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        foreach($properties as $property){
            $nameCamelCase = $property->getName();
            $nameToDb = $this->formatToBd($nameCamelCase); 
            $nameAndValue[$nameToDb] = $this->$nameCamelCase;
        }

        return $nameAndValue;
    }

    abstract protected static function getTableName();
}