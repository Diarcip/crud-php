<?php
function save_City(){
  $COD_City = $_GET['COD_City'];
  $Name_City = $_GET['Name_City'];

  $Query_Cities_list = "SELECT * FROM cities WHERE cod = '$COD_City'";
  $ExecQuery_Cities_list = mysqli_query($GLOBALS['CON'],$Query_Cities_list);

  if(mysqli_num_rows($ExecQuery_Cities_list)>0){
    $UPDATE = "UPDATE cities SET name='$Name_City' WHERE cities.cod = '$COD_City'";
    $QueryUPDATE = mysqli_query($GLOBALS['CON'],$UPDATE);
    if(!$QueryUPDATE){
      ?><div class="alert alert-danger text-center" role="alert">An error occurred while saving the information</div><?php
    }else{
      ?><div class="alert alert-success text-center" role="alert">City info updated correctly</div><?php
    }
  }else{
    $INSERT = "INSERT INTO cities (cod,name) values ('$COD_City', '$Name_City')";
    $QueryINSERT = mysqli_query($GLOBALS['CON'],$INSERT);
    if(!$QueryINSERT){
      ?><div class="alert alert-danger text-center" role="alert">An error occurred while saving the information</div><?php
    }else{
      ?><div class="alert alert-success text-center" role="alert">City created correctly</div><?php
    }
  }
}
?>
<div class="form-section d-flex flex-column">
  <p class="h1 text-center">City information</p>
  <div class="form-section-data">
    <form class="global-form form-City" action="cities.php" method="GET">
      <div class="form-group">
        <div class="row g-3 align-items-center">
          <div class="input-group info-box">
            <span for="COD_City" class="input-group-text">COD</span>
            <input type="text" id="COD_City" name="COD_City" value="<?php echo $ROW_ID;?>" class="form-control" required/>
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="Name_City" class="input-group-text">City Name</span>
            <input
              type="text"
              id="Name_City"
              name="Name_City"
              class="form-control" value="<?php echo $ROW_CN;?>" required
            />
          </div>
          <!-- -------------- -->
          <button class="btn btn-success btn-form-city" type="submit" name="submit" value="click"><i class="fas fa-save"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php

if(isset($_GET['submit'])){
  save_City();
}
?>