<?php
/*
require "database/Connection.php";
require "database/QueryBuilder.php";

try{
    $config = require_once 'app/config.php';
    $connection = Connection::make($config['database']);
    $queryBuilder = new QueryBuilder($connection, 'myNotes', '');
    
}catch (QueryBuilderException $queryBuilderExceptions){
    $errores[]=$queryBuilderExceptions->getMessage();
    var_dump($errores);
}
*/

require "view/index.view.php"; 