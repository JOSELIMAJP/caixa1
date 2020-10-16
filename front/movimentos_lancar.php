<?php 
// Inicia a sessão
session_start();
//limpa seção
//$_SESSION_unset();
//destroi sessão
//$_SESSION_destroy();

$_SESSION['usuario'];

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["usuario"]))
{
// Usuário não logado! Redireciona para a página de login

//Função para redirecionar a página para o link
function redireciona($link){
     if ($link==-1){
     echo" <script>history.go(-1);</script>";
     }else{
     echo" <script>document.location.href='$link'</script>";
     }
 };
//Cria uma variavel
$link = 'index.php';

//chama a funcao
redireciona($link); 
/*
header("Location: login.html");
exit;

*/
}


// Mostra uma frase na tela
//echo 'Olá ' . $_SESSION['usuario'];

?>
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
      <div class="logo">CAIXA1 - <?php echo 'Olá ' .$_SESSION['usuario']; ?> </div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="index2.php">Inicio</a></li>
        <li><a href="movimentos_lancar.php">Lançar Movimento</a></li>
        <li><a href="movimentos_list.php">Movimentos</a></li>
        <li><a href="movimentos_list_resumo.php">Resumo</a></li>
        <li><a href="cadastrar_evento.php">Cadastro eventos</a></li>
        <li><a href="#">Cadastro usuarios</a></li>
        <li><a href="index.php">Sair</a></li>
      </ul>
    </nav>
    <div class="content">
      <div>
      
          <br>
          <br>
        <p>Registrar  movimento</p>
        <p>&nbsp;</p>
        <p><?php 	
		define('HOST', 'localhost');
		define('USUARIO', 'id11247117_root2');
		define('SENHA', '<K8%HJ>!(6ufopEY');
		define('DB', 'id11247117_sisfinanceiro');

		$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
         
        $sql = mysqli_query($conexao,"SELECT SUM(movimentos_db-movimentos_cr) as Saldo FROM movimentos_saldo where `movimentos_evento`like('Caixa%')");
        
              while($dados=mysqli_fetch_assoc($sql))
    {
 $vr1= $dados['Saldo'];
        
       echo "Saldo Caixa: ".$vr1 = number_format($vr1, 2, '.', '')."<br>";
    }
    
            $sql = mysqli_query($conexao,"SELECT SUM(movimentos_db-movimentos_cr) as Saldo FROM movimentos_saldo where `movimentos_evento`like('Banco%')");
    
          while($dados=mysqli_fetch_assoc($sql))
    {
        
        $vr2= $dados['Saldo'];
        
       echo "Saldo Banco: ".$vr2 = number_format($vr2, 2, '.', '')."<br>";
    }
    
    
    
         ?></p>
        <p>&nbsp;</p>
        <p>Saldo Banco:</p> 
        
     
        
        <form name="form1" method="post" onsubmit="return valida()" action="movimentos_registrar2.php">
          <BR>
          <p>Data:</p>
          <p>
  <label for="textfield"></label>
            <input type="daje" name="data" id="textfield" value="<?php $hoje = date('d/m/Y');
echo $hoje;?>">
          </p>
          <BR>
          <p>Entrada/credito/a receber:</p>
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
  </select>
          </p>
          <BR>
          <p>Saida/debito/a pagar:</p>
 
          <p>
            <select name="credito">
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
          <BR>
          <p>Valor:</p>
          <p>
  <input type="text" inputmode="decimal" name="valor" id="valor">
          </p>
          <BR>
          <p>observação:</p>
          <p>
  <input type="text" name="observacao" id="observacao">
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
