<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Responsive Navigation Menu</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
        <li><a class="active" href="#">Inicio</a></li>
        <li><a href="lancarMovimento.php">Lançar Movimento</a></li>
        <li><a href="#">Cadastro eventos</a></li>
        <li><a href="#">Cadastro usuarios</a></li>
        <li><a href="#">Sair</a></li>
      </ul>
    </nav>
    <div class="content">
      <div>
        <p>Registrar  movimento</p>
        <p>&nbsp;</p>
        <form name="form1" method="post" action="registrar_movimento.php">
          <p>Data:</p>
          <p>
  <label for="textfield"></label>
            <input type="daje" name="data" id="textfield" value="<?php $hoje = date('d/m/Y');
echo $hoje;?>">
          </p>
          <p>Debitar:</p>
          <p>
  <select name="debito" >
		 <?php 	
		define('HOST', 'localhost');
		define('USUARIO', 'id11247117_root2');
		define('SENHA', '<K8%HJ>!(6ufopEY');
		define('DB', 'id11247117_sisfinanceiro');

		$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
         
        $sql = mysqli_query($conexao,"SELECT * FROM `evento` WHERE evento_id>0 order by evento_tipo asc" ) or die("Erro");
        
        while($dados=mysqli_fetch_assoc($sql))
    {
       echo '<option>'.$dados['evento_tipo']."-".$dados['evento_nome']."<br>".'</option>';
    }
        
		?>
  </select name="debito">
          </p>
          <p>Creditar</p>
          <p>
            <select name="select2">
		 <?php 	
		define('HOST', 'localhost');
		define('USUARIO', 'id11247117_root2');
		define('SENHA', '<K8%HJ>!(6ufopEY');
		define('DB', 'id11247117_sisfinanceiro');

		$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
         
        $sql = mysqli_query($conexao,"SELECT * FROM `evento` WHERE evento_id>0 order by evento_tipo asc" ) or die("Erro");
        
        while($dados=mysqli_fetch_assoc($sql))
    {
       echo '<option>'.$dados['evento_tipo']."-".$dados['evento_nome']."<br>".'</option>';
    }
		?>
            </select>
          </p>
          <p>observação:</p>
          <p>
  <input type="text" name="observacao" id="textfield5">
          </p>
          <p>&nbsp;</p>
          <p>
            <input type="submit" value="Lançar"/>
          </p>
        </form>
        <p>&nbsp;</p>
      </div>
    </div>
  </body>
</html>
