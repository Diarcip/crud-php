<?php

session_start();
include "includes/connection.php";

if($CON){
  echo "Hola";
}else{
  echo "No hay conexion";
}

//--------------------------------


if(!isset($_SESSION['ID'])){
  if(!empty($_GET['ID_User']) && !empty($_GET['PW_User'])){
    $ID_User = $_GET['ID_User'];
    $PW_User = $_GET['PW_User'];
    $Validation = "select * from users where ID = '$ID_User' and pass='$PW_User'";
    $Query_login = mysqli_query($CON,$Validation);
    if(mysqli_num_rows($Query_login)>0){
      $ROW = mysqli_fetch_array($Query_login);
      $_SESSION['id'] = $ROW['id'];
      $_SESSION['firstname'] = $ROW['firstname'];
      header("Location:index.php");
    }
  }else{
    header("Location:index.php");
  }
}else{
  header("Location:index.php");
}
?>

