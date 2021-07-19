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

  if(isset($_SESSION['id'])){
    $SessionStarted = true;
  }else{
    $SessionStarted = false;
  }
  ?>
      <?php include "views/nav.php"?>
    <div class="container">
      <div class="content">
        
        <form class="container-fluid form-register" action="register.php" method="GET">
        <p class="h1 text-center">Register</p>  
        <div class="input-group">

            <div class="input-group info-box">
            <span for="ID_User" class="input-group-text">ID</span>
            <input type="text" id="ID_User" name="ID_User" value="" class="form-control" required/>
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="FN_User" class="input-group-text">First name</span>
            <input
              type="text"
              id="FN_User"
              name="FN_User"
              class="form-control" value="" required
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="LN_User" class="input-group-text">Last name</span>
            <input
              type="text"
              id="LN_User"
              name="LN_User"
              class="form-control" value="" required
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="PW_User" class="input-group-text">Password</span>
            <input
              type="password"
              id="PW_User"
              name="PW_User"
              class="form-control" value="" required
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="Email_User" class="input-group-text">email</span>
            <input
              type="email"
              id="Email_User"
              name="Email_User"
              class="form-control" value="" required
            />
          </div>

          <input class="btn btn-primary btn-submit" type="submit" value="Submit" name="submit">
        </form>

        <?php

        function register(){
          $ID_User = $_GET['ID_User'];
          $FN_User = $_GET['FN_User'];
          $LN_User = $_GET['LN_User'];
          $PW_User = $_GET['PW_User'];
          $Email_User = $_GET['Email_User'];
          
          $UserQuery = "select * from users where id = '$ID_User'";
          $ExecUserQuery = mysqli_query($GLOBALS['CON'],$UserQuery);
          if(mysqli_num_rows($ExecUserQuery)>0){
            echo "<div class='alert alert-danger text-center' role='alert'>User already exists</div>";
          }else{
                       
            $ROW = mysqli_fetch_array($ExecUserQuery);
            $UserRegister = "INSERT INTO users VALUES ('$ID_User', '$FN_User', '$LN_User', '$PW_User', '$Email_User')";
            $ExecUserRegister = mysqli_query($GLOBALS['CON'],$UserRegister);
            if($ExecUserRegister){
              $_SESSION['id'] = $ID_User;
              $_SESSION['firstname'] = $FN_User;
              header("Location:index.php");
            }
          }

        } 
        if(isset($_GET['submit'])){
          if(!isset($_SESSION['id']) && !empty($_GET['ID_User']) && !empty($_GET['PW_User'])){
            register();
          }else{
              header("Location:index.php");
          } 
        }


        ?>

      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
