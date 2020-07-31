<?php
namespace CSY2028;
class DatabaseTable {
    private $table;
    private $pdo;
    private $primaryKey;

    public function __construct($pdo, $table, $primaryKey) {
    $this->pdo = $pdo;
    $this->table = $table;
    $this->primaryKey = $primaryKey;
    }
    public function find($field, $value) {
    $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
    $criteria = [
    'value' => $value
    ];
    $stmt->execute($criteria);
    return $stmt->fetchAll();
    }
    public function findMultiple($field, $value,$field0,$value0) {
    $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value AND '.$field0.' =:value0');
    $criteria = [
    'value' => $value,
    'value0' => $value0
    ];
    $stmt->execute($criteria);
    return $stmt->fetchAll();
    }
    public function findByID($value) {
    $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :value');
    $criteria = [
    'value' => $value
    ];
    $stmt->execute($criteria);
    return $stmt->fetchAll();
    }

    function save($record) {
        try {
          return  $this->insert($record);
        }catch (\PDOException $e) {
            $this->update($record);
        }
    }
    function insert($record) {
        $keys = array_keys($record);
        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);
        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
        return $this->pdo->lastInsertId();
    }
    function update($record) {
        $query = 'UPDATE ' . $this->table . ' SET ';
        $parameters = [];
        foreach ($record as $key => $value) {
        $parameters[] = $key . ' = :' .$key;
        }
        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';
        $record['primaryKey'] = $record[$this->primaryKey];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
    }

    function findAll() {
        $stmt =  $this->pdo->prepare('SELECT * FROM ' . $this->table );
        $stmt->execute();
        return $stmt->fetchAll();
    }
       
    public function delete($value) {
    $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :value');
    $criteria = [
    'value' => $value
    ];
    $stmt->execute($criteria);
    }
    public function deleteField($field, $value) {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
    }

    public function archive($value) {
        try 
        {
            $this->addArchive($value);
            $this->delete($value);
        }
    catch (\PDOException $e) {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . '_archive WHERE ' . $this->primaryKey . ' = :value');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
        $this->addArchive($value);
    }

    }

    public function addArchive($value){
        $stmt = $this->pdo->prepare('INSERT INTO ' . $this->table . '_archive SELECT * FROM '.$this->table.' WHERE ' . $this->primaryKey . ' = :value');
        $criteria = [
            'value' => $value
            ];
            $stmt->execute($criteria);
    }
    
}