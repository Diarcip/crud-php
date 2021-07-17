<div class="form-section">
  <p class="h1 text-center">Create or edit user info</p> 
  <div class="form-section-data">
    <form class="global-form" action="">
      <div class="form-group">
        <div class="row g-3 align-items-center">
          <div class="input-group info-box">
            <span for="id_user" class="input-group-text">ID</span>
            <input
              type="text"
              id="id_user"
              name="id_user"
              class="form-control"
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="name_user" class="input-group-text">First name</span>
            <input
              type="text"
              id="firstname_user"
              name="name_user"
              class="form-control"
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="name_user" class="input-group-text">Last name</span>
            <input
              type="text"
              id="name_user"
              name="lastname_user"
              class="form-control"
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="name_user" class="input-group-text">Password</span>
            <input
              type="password"
              id="name_user"
              name="password_user"
              class="form-control"
            />
          </div>
          <!-- -------------- -->
          <div class="input-group info-box">
            <span for="name_user" class="input-group-text">email</span>
            <input
              type="email"
              id="name_user"
              name="email_user"
              class="form-control"
            />
          </div>
          <!-- -------------- -->
        </div>
      </div>
    </form>
  </div>
  <div class="form-section-buttons">
    <div class="btn-group" role="group">
      <button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
      <button type="button" class="btn btn-success" disabled><i class="fas fa-save"></i></button>
    </div>
  </div>
</div>
<table class="table table-striped table-hover">
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
        <div
          class="btn-group btn-group-sm"
          role="group"
        >
          <button type="button" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
          </button>
          <button type="button" class="btn btn-success">
            <i class="fas fa-pen"></i>
          </button>
        </div>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
