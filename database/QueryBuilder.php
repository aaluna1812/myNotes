<?php
require_once  __DIR__.'/../exceptions/QueryBuilderExceptions.php';

class QueryBuilder{
    /**
     * @var PDO
     */
    private $connection;
    
    /**
     * @var string
     */
    private $table;

    /**
     * @var string
     */
    private $classEntity;

    /**
     * QueryBuilder constructor
     * @param PDO $connection
     * @param string $table
     * @param string $classEntity
     */

    public function __construct(PDO $connection, $table, $classEntity){
        $this -> connection = $connection;
        $this -> table = $table;
        $this -> classEntity = $classEntity;
    }

    /**
     * @return array
    * @throws QueryExceptions
    */

    // #ERR 001
    public function takeAll(){
        $sql = 'SELECT * FROM '.$this->table;
        $pdoStatement = $this->connection->prepare($sql);
        if ($pdoStatement->execute() === false){
            throw new QueryBuilderException("Could not load notes from DB. #ERR 001");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    // #ERR 002
    public function addNote($noteTitle, $newNote){
        $sql = "INSERT INTO ".$this->table."(title, note) VALUES('$noteTitle', '$newNote')";
        $pdoStatement = $this->connection->prepare($sql);
        if ($pdoStatement->execute() === false) {
            throw new QueryBuilderException("The note could not be saved to the DB. #ERR 002");
        }
        return true;
    }

    // #ERR 003
    public function editNote($id, $noteTitle, $newNote){
        $sql = "UPDATE ".$this->table." SET title = '$noteTitle', note = '$newNote' WHERE id = $id";
        $pdoStatement = $this->connection->prepare($sql);
        if ($pdoStatement->execute() === false) {
            throw new QueryBuilderException("The note could not be saved to the DB. #ERR 003");
        }else{
            return true;
        }
        
    }
}