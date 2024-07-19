<?php
include("connectToDb.php");
if(!empty($_POST["btnlog"])){
    if(empty($_POST["user"]) && empty($_POST["password"])){
        echo 'Campos vacios';
    }else{
        $usuario=$_POST["user"];
        $password=$_POST["password"];
        $sql=$con->query("select * from usuario where user='$usuario' and password='$password'");
        if($datos=$sql->fetch_object()){
            header("location:index.php");
            session_start();
            $_SESSION["logged"] = true;
            $_SESSION["role"] = $datos->role;
        }else{
            echo 'No existe';
        }
    }
}
?>