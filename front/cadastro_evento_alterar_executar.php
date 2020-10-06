 <?php 
include("../conexao.php");


	$evento_id = $_GET['evento_id'];
    $evento_nome= $_GET['evento'];
    $evento_tipo= $_GET['tipo'];
    $observacao= $_GET['observacao'];
    
    
    
    //evento=Outros+pagamentos&tipo=Banco&observacao=
    
    echo $evento_id."---".$evento_nome."--".$evento_tipo."--".$observacao;

	$query = mysqli_query($conexao, "UPDATE evento SET evento_nome = '$evento_nome' ,evento_tipo = '$evento_tipo',observacao='$observacao' WHERE `evento_id` = '$evento_id';");


//Função para redirecionar a página para o link
function redireciona($link){
     if ($link==-1){
     echo" <script>history.go(-1);</script>";
     }else{
     echo" <script>document.location.href='$link'</script>";
     }
 };
//Cria uma variavel
$link = 'cadastrar_evento.php';

//chama a funcao
redireciona($link); 

	
?>