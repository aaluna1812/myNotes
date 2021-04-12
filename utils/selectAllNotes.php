<?php
require "../database/Connection.php";
require "../database/QueryBuilder.php";

try{
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);
    $queryNotes = new QueryBuilder($connection, 'myNotes', '');

    $results = $queryNotes->takeAll();
    //var_dump($result[0]['title']);
    foreach ($results as $res) {
        $id = $res['id'];
        $title = trim(htmlspecialchars($res['title']));
        $note = trim(htmlspecialchars($res['note']));

        $data[] = array(
            'id' => $id,
            'title' => $title,
            'note' => $note
        );
    }

    if ($data && count($data) > 0) {
        $json_string = json_encode($data);
        echo '{"data":'.$json_string.'}';
    }
    
}catch (QueryBuilderException $queryBuilderExceptions){
    $errores[]=$queryBuilderExceptions->getMessage();
    var_dump($errores);
}