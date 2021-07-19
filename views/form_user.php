<?php
function save_user(){
  $ID_User = $_POST['ID_User'];
  $FName_User = $_POST['FName_User'];
  $LName_User = $_POST['LName_User'];
  $PW_User = $_POST['PW_User'];
  $Email_User = $_POST['Email_User'];

  $Query_users_list = "SELECT * FROM users WHERE id = '$ID_User'";
  $ExecQuery_users_list = mysqli_query($GLOBALS['CON'],$Query_users_list);

  if(mysqli_num_rows($ExecQuery_users_list)>0){
    $UPDATE = "UPDATE users SET firstname='$FName_User', lastname='$LName_User', pass='$PW_User', email='$Email_User' WHERE users.id = '$ID_User'";
    $QueryUPDATE = mysqli_query($GLOBALS['CON'],$UPDATE);
    if(!$QueryUPDATE){
      ?><div class="alert alert-danger text-center" role="alert">An error occurred while saving the information</div><?php
    }else{
      ?><div class="alert alert-success text-center" role="alert">User info updated correctly</div><?php
    }
  }else{
    $INSERT = "INSERT INTO users (id,firstname,lastname,pass,email) values ('$ID_User', '$FName_User', '$LName_User', '$PW_User', '$Email_User')";
    $QueryINSERT = mysqli_query($GLOBALS['CON'],$INSERT);
    if(!$QueryINSERT){
      ?><div class="alert alert-danger text-center" role="alert">An error occurred while saving the information</div><?php
    }else{
      ?><div class="alert alert-success text-center" role="alert">User created correctly</div><?php
    }
  }
}
?>
<div class="form-section">
  <p class="h1 text-center">User information</p> 
  <div class="form-section-data">
    <form class="global-form form-user" action="users.php" method="POST">
      <div class="form-group">
        <div class="row g-3 align-items-center">
          <div class="input-group info-box">
            <span for="ID_User" class="input-group-text">ID</span>
            <input type="text" id="ID_User" name="ID_User" value="<?php echo $ROW_ID;?>" class="form-control" required/>
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="FName_User" class="input-group-text">First name</span>
            <input
              type="text"
              id="FName_User"
              name="FName_User"
              class="form-control" value="<?php echo $ROW_FN;?>" required
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="LName_User" class="input-group-text">Last name</span>
            <input
              type="text"
              id="LName_User"
              name="LName_User"
              class="form-control" value="<?php echo $ROW_LN;?>" required
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="PW_User" class="input-group-text">Password</span>
            <input
              type="password"
              id="PW_User"
              name="PW_User"
              class="form-control" value="<?php echo $ROW_PW;?>" required
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="Email_User" class="input-group-text">email</span>
            <input
              type="email"
              id="Email_User"
              name="Email_User"
              class="form-control" value="<?php echo $ROW_EMAIL;?>" required
            />
          </div>
          <!-- -------------- -->
          <button class="btn btn-success btn-form-user" type="submit" name="submit" value="click"><i class="fas fa-save"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php

if(isset($_POST['submit'])){
  save_user();
}
?>