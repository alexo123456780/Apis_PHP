<?php

header("Content-Type: application/json");

require_once "get.php";
require_once "post.php";
require_once "put.php";




$get = new Get();
$post = new Post();
$put = new Put();

$method = $_SERVER["REQUEST_METHOD"];


switch($method){

    case "GET":
    echo isset($_GET['id']) ? $get->obtenerUsuariosId($_GET['id']) : $get->obtenerUsuarios();    
    break;

    case "POST":
    echo $post->agregarUsuario(json_decode(file_get_contents("php://input"),true));
    break;    


    case "PUT":
    echo $put->actualizarUsuario(json_decode(file_get_contents("php://input"),true));
    break;    
        
    
    
    default:
    json_encode(["message" => "caso no valido"]);
    break;


}





