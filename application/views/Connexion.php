<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 05/02/2019
 * Time: 09:17
 */

$user="root";
$pass="";
$dsn="mysql:host=localhost; dbname=locagest";

try{
    $con =new PDO($dsn, $user, $pass);
    echo "Page de connexion";
}catch(PDOException $e){
    die("Erreur de connexion à la base de données :".$e->getMessage());
}