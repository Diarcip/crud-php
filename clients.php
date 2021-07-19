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
    include ("includes/connection.php");
    include ("views/nav.php");


    if (isset($_POST['delete'])) {
      $Parameter = $_POST['delete'];
      Delete_Client($Parameter);
    }

    if (isset($_POST['edit'])) {
      $Parameter = $_POST['edit'];
      Get_Client($Parameter);
    }

    function Delete_Client($Client_COD){
      $QueryDelete = "DELETE FROM clientes WHERE cod = '$Client_COD'";
      $Delete = mysqli_query($GLOBALS['CON'],$QueryDelete);
      ?> <div class="alert alert-success text-center" role="alert">client deleted successfully</div><?php
    }
    
    function Get_Client($Client_COD){

      $SELECT_Client = "SELECT * FROM clientes WHERE cod = '$Client_COD'";
      $ExecSELECT_Client = mysqli_query($GLOBALS['CON'],$SELECT_Client);

      if($ExecSELECT_Client){
        while($ROW = mysqli_fetch_assoc($ExecSELECT_Client)){
          $ROW_COD = $ROW['cod'];
          $ROW_NAME = $ROW['name'];
          $ROW_CITY = $ROW['city'];
          return array($ROW_COD, $ROW_NAME, $ROW_CITY);
        }
      }

    }
    if(isset($Parameter)){
      list($ROW_COD, $ROW_NAME, $ROW_CITY) = Get_Client($Parameter);
    }else{
      $ROW_COD = "";
      $ROW_NAME = "";
      $ROW_CITY = "";
    }?>
<div class="container">
    <div class="content">
<?php
if($SessionStarted){
            
  include("views/form_client.php");

?>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">COD</th>
        <th scope="col">Name</th>
        <th scope="col">City</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $Query_clients_list = "select clientes.cod as ID, clientes.name as NAME, cities.name as CITY from clientes, cities where clientes.city = cities.cod";
      $ExecQuery_clients_list = mysqli_query($CON,$Query_clients_list);

      while($clients_list  = mysqli_fetch_assoc($ExecQuery_clients_list)){
        $Client_COD = $clients_list['ID'];
        $Client_Name = $clients_list['NAME'];
        $Client_City = $clients_list['CITY'];
        ?>
      <tr>
        <th scope="row" class=""><?php echo $Client_COD; ?></th>
        <td class=""><?php echo $Client_Name; ?></td>
        <td class=""><?php echo $Client_City; ?></td>
        <td class="">
          <form class="actions" action="clients.php" method="POST">
            <div class="btn-group btn-group-sm" role="group">


              <button type="submit" name="delete" value="<?php echo $Client_COD;?>" class="btn btn-danger action-delete-client">
              <i class="fas fa-trash-alt"></i>



              <button type="submit" name="edit" value="<?php echo $Client_COD;?>" class="btn btn-primary action-edit">
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

</body>
</html>
