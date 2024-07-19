<?php
if(isset($_SESSION['logged']) == false || $_SESSION['logged'] == false){
    session_start();
    $currentRole = $_SESSION['role'];
    if($currentRole != "admin"){
      header("location:index.php");
    }else{
      include("connectToDb.php");
    }
  }
?>