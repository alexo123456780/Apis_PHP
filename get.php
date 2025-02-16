<?php

require_once "conexion.php";

class Get extends Database
{

    //GET 

    public function obtenerUsuarios(){

        try{

            $consulta = $this->conexion->query("SELECT * FROM usuarios");

            return json_encode($consulta->fetchAll(PDO::FETCH_ASSOC));


        }catch(PDOException $e){

            return json_encode(["message" => "Usuarios no encontrado".$e->getMessage()]);

        }

    }


    //GET [ID]
    public function obtenerUsuariosId($id){

        try{

            $peticion = $this->conexion->prepare("SELECT * FROM usuarios WHERE id = ?");

            $peticion->execute([$id]);

            $usuario = $peticion->fetch(PDO::FETCH_ASSOC);

            return json_encode($usuario ? $usuario : ["message" => "usuario no encontrado"]);


        }catch(PDOException $e){

            return json_encode(["message" => "error de busqueda del usuario".$e->getMessage()]);

        }



    }







}






