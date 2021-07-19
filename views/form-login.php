<form class="container-fluid form-login" action="index.php" method="POST">
<p class="h1 text-center">Log in</p>  
<div class="input-group">
    <span class="input-group-text" id="basic-addon1">User</span>
    <input name="ID_User" class="form-control" type="text">
  </div>
  <div class="input-group">
    <span class="input-group-text" id="basic-addon1">Password</span>
    <input name="PW_User" class="form-control" type="password">
  </div>
  <input class="btn btn-primary btn-submit" type="submit" value="Submit" name="submit">
  <a class="btn btn-success btn-submit" href="register.php" role="button">Register</a>
</form>

<?php

function login(){
  $ID_User = $_POST['ID_User'];
  $PW_User = $_POST['PW_User'];
  $Validation = "select * from users where ID = '$ID_User' and pass='$PW_User'";
  $Query_login = mysqli_query($GLOBALS['CON'],$Validation);
  if(mysqli_num_rows($Query_login)>0){
    $ROW = mysqli_fetch_array($Query_login);
    $_SESSION['id'] = $ROW['id'];
    $_SESSION['firstname'] = $ROW['firstname'];
    $_SESSION['users'] = "novisible";
    $_SESSION['clients'] = "novisible";
    $_SESSION['cities'] = "novisible";
    header("Location:index.php");
  }

} 
if(isset($_POST['submit'])){
  if(!isset($_SESSION['ID']) && !empty($_POST['ID_User']) && !empty($_POST['PW_User'])){
    login();
  }else{
      header("Location:index.php");
  } 
}


?>