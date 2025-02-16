<?php

class Database
{

    private $host,$dbname,$userName,$password;
    protected $conexion;


    public function __construct(){

        $this->host = "localhost";
        $this->dbname = "mi_api";
        $this->userName = "root";
        $this->password = "";


        try{

            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8",$this->userName,$this->password);

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){

            die(json_encode(["message"=> "Error al conectar ala base de datos".$e->getMessage()]));

        }

    }
    







}



