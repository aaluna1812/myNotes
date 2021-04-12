<?php
require "../database/Connection.php";
require "../database/QueryBuilder.php";

try{
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);
    $queryNotes = new QueryBuilder($connection, 'myNotes', '');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idNote = $_POST['idNote'];
        $noteTitle = trim(htmlspecialchars($_POST['noteTitle']));
        $newNote = trim(htmlspecialchars($_POST['newNote']));

        if ($noteTitle && $newNote) {
            $respuesta = $queryNotes->editNote(intval($idNote), $noteTitle,$newNote);

            if ($respuesta === true){
                echo "exito";
            }else{
                echo "fracaso";
            }
        }
    }
}catch (QueryBuilderException $queryBuilderExceptions){
    $errores[]=$queryBuilderExceptions->getMessage();
    var_dump($errores);
}