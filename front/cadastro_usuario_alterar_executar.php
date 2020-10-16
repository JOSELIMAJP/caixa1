 <?php 
include("../conexao.php");


	$usuario_id = $_GET['usuario_id'];
    $usuario_nome= $_GET['usuario'];
    $usuario_senha= $_GET['senha'];
    
    
    
   /*
    $usuario_id = 10;
    $usuario_nome= "ssss";
    $usuario_senha= "11ssss11";
    
     */
        
    ///echo $usuario_id."---".$usuario_nome."--".$usuario_senha;

	$query = mysqli_query($conexao, "UPDATE usuario SET `usuario_id` = '$usuario_id' ,`usuario` = '$usuario_nome',`senha`=md5('$usuario_senha') WHERE `usuario_id` = '$usuario_id';");

//UPDATE usuario SET `usuario_id` = '10' ,`usuario` = 'usuario_nome',`senha`='usuario_senha' WHERE `usuario_id` = '10'
	
	
//UPDATE usuario SET `usuario_id` = 10 ,`usuario` = 'usuario_nome',`senha`=md5('usuario_senha') WHERE`usuario_id`='usuario_id'

//UPDATE usuario SET `usuario_id` = '10' ,`usuario` = 'zzzz',`senha`='111' WHERE `usuario_id` = '10';


//Função para redirecionar a página para o link



function redireciona($link){
     if ($link==-1){
     echo" <script>history.go(-1);</script>";
     }else{
     echo" <script>document.location.href='$link'</script>";
     }
 };
//Cria uma variavel
$link = 'cadastro_usuario.php';

//chama a funcao
redireciona($link); 


?>