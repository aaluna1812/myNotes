<?php
require "../database/Connection.php";
require "../database/QueryBuilder.php";

try{
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);
    $queryNotes = new QueryBuilder($connection, 'myNotes', '');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $noteTitle = trim(htmlspecialchars($_POST['noteTitle']));
        $newNote = trim(htmlspecialchars($_POST['newNote']));

        if ($noteTitle && $newNote) {
            $respuesta = $queryNotes->addNote($noteTitle,$newNote);
            var_dump($respuesta);
            if ($respuesta === true){
                echo '{"data":'.json_encode("true").'}';
            }else{
                echo '{"data":'.json_encode("false").'}';
            }
        }
    }
}catch (QueryBuilderException $queryBuilderExceptions){
    $errores[]=$queryBuilderExceptions->getMessage();
    var_dump($errores);
}