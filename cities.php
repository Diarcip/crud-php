<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prueba Técnica</title>
    <script src="https://kit.fontawesome.com/0c6518fdab.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="index.js"></script>
    <link rel="stylesheet" href="main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
  </head>
  <body>

<?php

  session_start();
  include "includes/connection.php";
  include ("views/nav.php");
  if (isset($_POST['delete'])) {
    $Parameter = $_POST['delete'];
    Delete_City($Parameter);
  }

  if (isset($_POST['edit'])) {
    $Parameter = $_POST['edit'];
    Get_User($Parameter);
  }

  function Delete_City($COD_City){
    $QueryDelete = "DELETE FROM cities WHERE cod = '$COD_City'";
    $Delete = mysqli_query($GLOBALS['CON'],$QueryDelete);
    ?> <div class="alert alert-success text-center" role="alert">City deleted successfully</div><?php
  }
  
  function Get_User($COD_City){

    $SELECT_City = "SELECT * FROM cities WHERE cod = '$COD_City'";
    $ExecSELECT_City = mysqli_query($GLOBALS['CON'],$SELECT_City);

    if($ExecSELECT_City){
      while($ROW = mysqli_fetch_assoc($ExecSELECT_City)){
        $ROW_ID = $ROW['cod'];
        $ROW_CN = $ROW['name'];
        return array($ROW_ID, $ROW_CN);
      }
    }

  }
  if(isset($Parameter)){
    list($ROW_ID, $ROW_CN) = Get_User($Parameter);
  }else{
    $ROW_ID = "";
    $ROW_CN = "";
  }?>
<div class="container">
    <div class="content">
<?php
if($SessionStarted){
  include("views/form_cities.php");

?>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">COD</th>
      <th scope="col">City Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $Query_cities_list = "select * from cities ORDER BY cod asc";
    $ExecQuery_cities_list = mysqli_query($CON,$Query_cities_list);

    while($cities_list  = mysqli_fetch_assoc($ExecQuery_cities_list)){
      $COD_City = $cities_list['cod'];
      $Name_City = $cities_list['name'];
      ?>
    <tr>
      <th scope="row" class=""><?php echo $COD_City; ?></th>
      <td class=""><?php echo $Name_City; ?></td>
      <td class="">
        <form class="actions" action="cities.php" method="POST">
          <div class="btn-group btn-group-sm" role="group">

            <button type="submit" name="delete" value="<?php echo $COD_City;?>" class="btn btn-danger action-delete-cities">
            <i class="fas fa-trash-alt"></i>

            <button type="submit" name="edit" value="<?php echo $COD_City;?>" class="btn btn-primary action-edit-cities">
              <i class="fas fa-pen"></i>
            </button>

          </div>
        </form>  
      </td>
    </tr>

    <?php }?>
  </tbody>
</table>
<?php
}else{
  include ("views/form-login.php");
}
?>