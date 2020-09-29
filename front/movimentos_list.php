<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Caixa1 - Gestao Financeira</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <script language="javascript">
function valida(){
   var campo = document.getElementById("valor");
   if(campo.value == ""){
       alert("Campo valor obrigatorio!");
       return false;
   } 
   return true;
}
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <nav>
      <div class="logo">CAIXA1 </div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="pag_inicial2.php">Inicio</a></li>
        <li><a href="movimentos_lancar.php">Lançar Movimento</a></li>
        <li><a href="#">Cadastro eventos</a></li>
        <li><a href="#">Cadastro usuarios</a></li>
        <li><a href="#">Sair</a></li>
      </ul>
    </nav>
    <div class="content">
      <div>
          <br>
          <br>
        <p>movimentos</p>
        <p>&nbsp;</p>
 
 
 <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
 <thead>
  <tr>
   <th>data</th>
   <th>debito</th>
   <th>credito</th>
   <th>valor</th>
   <th>Update</th>
   <th>Delete</th>
  </tr>
 </thead>
 <tbody>
  <?php
include("../conexao.php");

$Show = mysqli_query($conexao, "SELECT * FROM movimentos");
while($r = mysqli_fetch_array($Show)): ?>


    <tr>
     <td><?php echo $r['movimentos_data']; ?></td>
     <td><?php echo $r['movimentos_evento_d']; ?></td>
     <td><?php echo $r['movimentos_evento_c']; ?></td>
     <td><?php echo $r['movimentos_valor']; ?></td>
     <td><p><a href="update.php?update_id=<?php echo $r['movimentos_id']; ?>" class="btn btn-warning">
   
      <img src="../icons/add.png" width="20" height="20" /></a></p></td>
     <td><a href="movimentos_delete.php?delete_id=<?php echo $r['movimentos_id']; ?>" class="btn btn-danger">
  
      <img src="../icons/delete.png" width="20" height="20" /></a></td>
    </tr>
    <?php endwhile; ?>
 </tbody>
 </table>
 
 
        <p>&nbsp;</p>
      </div>
    </div>
  </body>
</html>
