<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $productId = $_POST["productId"];
    $productName = $_POST["productName"]; $productDesc = $_POST["productDesc"]; 
    $productPrice = $_POST["productPrice"]; $productImgUrl = $_POST["productImgUrl"]; $productStock = $_POST["productStock"];
    try{
        //require_once "connectToDb.php";
        $dsn = "mysql:host=localhost;dbname=proyectobackend";
        $dbusername = "root";
        $dbpassword = "";
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $query = "INSERT INTO producto (nombre, descripcion, precio, imgurl, stock) VALUES (:nombre, :descripcion,:precio, :imgurl,:stock)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":nombre", $productName);
        $stmt->bindParam(":descripcion", $productDesc);
        $stmt->bindParam(":precio", $productPrice);
        $stmt->bindParam(":imgurl", $productImgUrl);
        $stmt->bindParam(":stock", $productStock);
        $stmt->execute();

        $con = null;
        $stmt = null;
        header("Location: ./listProducts.php");
        die();
    }
    catch(PDOException $e){  
        die("Error " . $e);
    }   

    
}
?>