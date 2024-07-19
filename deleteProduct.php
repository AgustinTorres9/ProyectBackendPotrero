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
        $query = "DELETE from producto WHERE id = $productId";

        $stmt = $pdo->prepare($query);
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