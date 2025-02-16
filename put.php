<?php

require_once "conexion.php";

class Put extends Database
{

    public function actualizarUsuario($data){

        if(!isset($data["nombre"],$data["email"],$data["edad"],$data["id"])){

           return json_encode(["message" => "ingrese todos los datos necesarios para actualizar"]);

        }

        try{

            $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE id = ?");

            $consulta->execute([$data['id']]);
            
            $usuarioExistente = $consulta->fetch(PDO::FETCH_ASSOC);

            if(!$usuarioExistente){

                return json_encode(["message" => "usuario no encontrado"]);

            }


            $actualizar = $this->conexion->prepare("UPDATE usuarios SET nombre = ? , email = ? , edad = ? WHERE id = ?");

            
            $actualizar->execute([$data["nombre"],$data["email"],$data["edad"],$data["id"]]);

            


            return json_encode(["succes" => "usuario actualizado correctamente"]);




        }catch(PDOException $e){

            return json_encode(["message" => "error al actualizar el usuario".$e->getMessage()]);
            
        }


    }








}


