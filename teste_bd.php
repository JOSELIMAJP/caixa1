<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <ul>
    
    <?php
define('HOST', 'localhost');
define('USUARIO', 'id11247117_root2');
define('SENHA', '<K8%HJ>!(6ufopEY');
define('DB', 'id11247117_sisfinanceiro');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');


         $sql = mysqli_query($conexao,"SELECT * FROM `evento` WHERE evento_id>0") or die("Erro");
while($dados=mysqli_fetch_assoc($sql))
    {
       // echo $dados['evento_nome']."-".$dados['evento_tipo']."<br>";
    }


?>
    </ul>
    <form name="produto" method="post" action="">
         <label for="">Selecione um produto</label>
         <select>

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
		

         
         <?php 
		 /*
		 $Sql = "SELECT * FROM `evento` WHERE evento_id>0";
		 $Resultado = mysql_query($Sql,$conexao);
         while($registro = mysqli_fetch_array($Resultado)) { ?>
         <option = "<?php echo $registro['evento_nome'] ?>"></option>
         <?php }
		 
		 */
		  ?>

         </select>

      
    </form>
</body>
</html>