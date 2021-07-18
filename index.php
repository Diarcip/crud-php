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
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"
            >Welcome
            <?php 
            if($SessionStarted){
              echo $_SESSION['firstname'];
            }
            ?>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a href="index.php" class="nav-link">Users</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Clients</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Cities</a>
              </li>
            </ul>
            <a class="btn btn-primary" role="button" href="logout.php"
              >Log out</a
            >
          </div>
        </div>
      </nav>

      <div class="content">
        <?php
          if(!$SessionStarted){
            include "views/form-login.php";
          }else{
            include "views/users.php";
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
