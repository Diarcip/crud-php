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
        <?php
          if(!$SessionStarted){
            include "views/form-login.php";
          }else{
            include "views/welcome.php";
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
