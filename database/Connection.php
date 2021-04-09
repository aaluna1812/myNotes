<?php


class Connection
{
    public static function make($config){
        try {
            $connection = new PDO(
              $config['connection'] . ';dbname=' . $config['name'] . '; charset=utf8',
              $config['username'],
              $config['password'],
              $config['options']

            );
        }
        catch (PDOException $PDOException){
            die($PDOException->getMessage());
        }
        return $connection;
    }
}