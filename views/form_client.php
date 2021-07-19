<?php
function save_Client(){
  $COD_Client = $_POST['COD_Client'];
  $Name_Client = $_POST['Name_Client'];
  $City_Client = $_POST['City_Client'];

  $Query_Clients_list = "SELECT * FROM clientes WHERE cod = '$COD_Client'";
  $ExecQuery_Clients_list = mysqli_query($GLOBALS['CON'],$Query_Clients_list);
  
  if(mysqli_num_rows($ExecQuery_Clients_list)>0){
    $UPDATE = "UPDATE clientes SET name='$Name_Client', city='$City_Client' WHERE clientes.cod = '$COD_Client'";
    $QueryUPDATE = mysqli_query($GLOBALS['CON'],$UPDATE);
    if(!$QueryUPDATE){
      ?><div class="alert alert-danger text-center" role="alert">An error occurred while saving the information</div><?php
    }else{
      ?><div class="alert alert-success text-center" role="alert">Client info updated correctly</div><?php
    }
  }else{
    $INSERT = "INSERT INTO clientes (cod,name,city) values ('$COD_Client', '$Name_Client', '$City_Client')";
    $QueryINSERT = mysqli_query($GLOBALS['CON'],$INSERT);
    if(!$QueryINSERT){
      ?><div class="alert alert-danger text-center" role="alert">An error occurred while saving the information</div><?php
    }else{
      if(mysqli_num_rows($ExecQuery_Clients_list)>0){
        ?><div class="alert alert-success text-center" role="alert">Existing client code, a new client was created.</div><?php
      }else{
        ?><div class="alert alert-success text-center" role="alert">Client created succesfully</div><?php
      }
    }
  }
}
?>
<div class="form-section">
  <p class="h1 text-center">Client information</p> 
  <div class="form-section-data">
    <form class="global-form form-Client" action="clients.php" method="POST">
      <div class="form-group">
        <div class="row g-3 align-items-center">
          <div class="input-group info-box">
            <span for="COD_Client" class="input-group-text">COD</span>
            <input type="text" id="COD_Client" name="COD_Client" value="<?php echo $ROW_COD;?>" class="form-control" required/>
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="Name_Client" class="input-group-text">Name</span>
            <input
              type="text"
              id="Name_Client"
              name="Name_Client"
              class="form-control" value="<?php echo $ROW_NAME;?>" required
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="City_Client" class="input-group-text">City</span>
            <input
              type="list"
              list="cities"
              id="City_Client"
              name="City_Client"
              class="form-control" value="<?php echo $ROW_CITY;?>" required
            />
            <datalist id="cities">
              <?php
                $QueryCities = "SELECT * FROM cities ORDER BY name";
                $ExecQueryCities = mysqli_query($GLOBALS['CON'], $QueryCities);

                if($ExecQueryCities){
                    while ($ROW = mysqli_fetch_assoc($ExecQueryCities)){
                        echo '<option value="'.$ROW['cod'].'">'.$ROW['name'].'</option>';
                    }
                }
              ?>
              </datalist>
          </div>
          <!-- -------------- -->
          <!-- -------------- -->
          <button class="btn btn-success btn-form-Client" type="submit" name="submit" value="click"><i class="fas fa-save"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php

if(isset($_POST['submit'])){
  save_Client();
}
?>