<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"
            >Welcome
            <?php 

            if(isset($_SESSION['id'])){
              $SessionStarted = true;
            }else{
              $SessionStarted = false;
            }
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
                <a href="users.php" class="nav-link" >Users</a>
              </li>
              <li class="nav-item">
                <a href="clients.php" class="nav-link ">Clients</a>
              </li>
              <li class="nav-item">
                <a href="cities.php" class="nav-link">Cities</a>
              </li>
            </ul>
            <a class="btn btn-primary" role="button" href="logout.php"
              >Log out</a
            >
          </div>
        </div>
      </nav>