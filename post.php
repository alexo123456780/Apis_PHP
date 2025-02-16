<?php

require_once "conexion.php";

class Post extends Database
{

    //POST
    public function agregarUsuario($data){

        if(!isset($data["nombre"],$data["email"],$data["edad"])){

            return json_encode(["message"=>"Inserte todos los datos requeridos"]);

        }



        try{

            $peticion = $this->conexion->prepare("INSERT INTO usuarios (nombre,email,edad) VALUES (?,?,?)");

            $peticion->execute([$data["nombre"] , $data["email"], $data["edad"]]);

            return json_encode(["succes" => "usuario registrado exitosamente"]);


        }catch(PDOException $e){

            return json_encode(["message" => "usario no encontrado".$e->getMessage()]);

        }

    }









}





