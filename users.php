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
    Delete_User($Parameter);
  }

  if (isset($_POST['edit'])) {
    $Parameter = $_POST['edit'];
    Get_User($Parameter);
  }

  function Delete_User($ID_User){
    include "includes/connection.php";
    $QueryDelete = "DELETE FROM users WHERE id = '$ID_User'";
    $Delete = mysqli_query($GLOBALS['CON'],$QueryDelete);
    ?> <div class="alert alert-success text-center" role="alert">User deleted successfully</div><?php
  }
  
  function Get_User($ID_User){

    $SELECT_User = "SELECT * FROM users WHERE id = '$ID_User'";
    $ExecSELECT_User = mysqli_query($GLOBALS['CON'],$SELECT_User);

    if($ExecSELECT_User){
      while($ROW = mysqli_fetch_assoc($ExecSELECT_User)){
        $ROW_ID = $ROW['id'];
        $ROW_FN = $ROW['firstname'];
        $ROW_LN = $ROW['lastname'];
        $ROW_PW = $ROW['pass'];
        $ROW_EMAIL = $ROW['email'];
        return array($ROW_ID, $ROW_FN, $ROW_LN, $ROW_PW, $ROW_EMAIL);
      }
    }

  }
  if(isset($Parameter)){
    list($ROW_ID, $ROW_FN, $ROW_LN, $ROW_PW, $ROW_EMAIL) = Get_User($Parameter);
  }else{
    $ROW_ID = "";
    $ROW_FN = "";
    $ROW_LN = "";
    $ROW_PW = "";
    $ROW_EMAIL = "";
  }?>
<div class="container">
    <div class="content">
<?php
if($SessionStarted){
  include("views/form_user.php");

?>
<table class="table table-striped table-hover" data-search="true">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $Query_users_list = "select id as ID, firstname as FirstName, lastname as LastName, pass as Password, email as Email from users ORDER BY id asc";
    $ExecQuery_users_list = mysqli_query($CON,$Query_users_list);

    while($Users_list  = mysqli_fetch_assoc($ExecQuery_users_list)){
      $User_ID = $Users_list['ID'];
      $User_FirstName = $Users_list['FirstName'];
      $User_LastName = $Users_list['LastName'];
      $User_Password = $Users_list['Password'];
      $User_Email = $Users_list['Email'];
      ?>
    <tr>
      <th scope="row" class=""><?php echo $User_ID; ?></th>
      <td class=""><?php echo $User_FirstName; ?></td>
      <td class=""><?php echo $User_LastName; ?></td>
      <td class=""><?php echo $User_Password; ?></td>
      <td class=""><?php echo $User_Email; ?></td>
      <td class="">
        <form class="actions" action="users.php" method="POST">
          <div class="btn-group btn-group-sm" role="group">

            <button type="submit" name="delete" value="<?php echo $User_ID;?>" class="btn btn-danger action-delete-user">
            <i class="fas fa-trash-alt"></i>

            <button type="submit" name="edit" value="<?php echo $User_ID;?>" class="btn btn-primary action-edit-user">
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