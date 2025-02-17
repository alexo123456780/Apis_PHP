<?php

require_once "conexion.php";


class Delete extends Database{

    public function eliminarUsuario($data){

        $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE id = ?");

        $consulta->execute([$data['id']]);

        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if(!$usuario){

            return json_encode(["message" => "usuario no encontrado"]);

        }

        try{

            $eliminar = $this->conexion->prepare("DELETE FROM  usuarios WHERE id = ?");
            $eliminar->execute([$data['id']]);

             return json_encode(["succes" => "usuario eliminado con exito"]);


        }catch(PDOException $e){

            return json_encode(["error" => "ocurrio un error al eliminar el usuario".$e->getMessage()]);

        }



    }






}

