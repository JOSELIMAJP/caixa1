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
      var campo1 = document.getElementById("evento");
      var campo2 = document.getElementById("tipo");
      
      if(campo1.value  == ""){
          alert("Descriação obrigatoria!");
          return false;
      } 
      
      return true;
      
            if(campo2.value  == ""){
          alert("Tipo obrigatorio!");
          return false;
      } 
      
      
        return true;
      
      
    }
    </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      </head>
      <body>
      <nav>
          <div class="logo">CAIXA1 - <?php echo 'Olá ' .$_SESSION['usuario'];?></div>
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
            <li><a href="cadastrar_usuario.php">Cadastro usuarios</a></li>
            <li><a href="index.php">Sair</a></li>
          </ul>
        </nav>
        <div class="content">
          <div>

          <?php
       include("../conexao.php");
        $id = $_GET["update_id"];
       //echo $id;
    
        $Show = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE usuario_id=$id;");
         while($r = mysqli_fetch_array($Show)):
         
         ?>
          
              <br>
              <br>
            <p>Registrar usuario</p>
            <p>&nbsp;</p>
            <p>
          

            <?php 	     
            ?></p>
            <form name="form1" method="get" onsubmit="return valida()" action="cadastro_usuario_alterar_executar.php">
              
      <label for="textfield"></label>
              </p>
              
                            <p>Id:</p>
              <p>
      <input type="text" inputmode="decimal" name="usuario_id" id="usuario_id" value="<?php echo $r['usuario_id']; ?>">
              </p>
              </p>
              <p>Usuario:</p>
              <p>
      <input type="text" inputmode="decimal" name="usuario" id="usuario" value="<?php echo $r['usuario']; ?>">
              </p>

              <p>Senha:</p>
              <p>
      <input type="password" inputmode="" name="senha" id="senha" value="">
              </p>
              </p>
              <p>&nbsp;</p>
              
              
              <?php endwhile;?>
              
                <input type="submit" value="Alterar usuario"/>
              </p>
            </form>
            <p>&nbsp;</p>
            
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
      <tr>
      <th>Id</th>
      <th>Usuario</th>
      <th>Alterar</th>
      <th>Deletar</th>
      </tr>
    </thead>
    <tbody>
      <?php
    //include("../conexao.php");

    $Show = mysqli_query($conexao, "SELECT * FROM usuario");
    while($r = mysqli_fetch_array($Show)): ?>


        <tr>
        <td><?php echo $r['usuario_id']; ?></td>
        <td><?php echo $r['usuario']; ?></td>
        <td><p><a href="cadastro_usuario_alterar.php?update_id=<?php echo $r['usuario_id']; ?>" class="btn btn-warning">
          
          <img src="../icons/add.png" width="20" height="20" /></a></p></td>
        <td><a href="cadastro_usuario_delete.php?delete_id=<?php echo $r['usuario_id']; ?>" class="btn btn-danger">
      
          <img src="../icons/delete.png" width="20" height="20" /></a></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
            
            
          </div>
        </div>
      </body>
    </html>