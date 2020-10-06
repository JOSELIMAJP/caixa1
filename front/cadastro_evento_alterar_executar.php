 <?php 
include("../conexao.php");


	$evento_id = $_GET['evento_id'];
    $evento_nome= $_GET['evento'];
    $evento_tipo= $_GET['tipo'];
    $observacao= $_GET['observacao'];
    
    
    
    //evento=Outros+pagamentos&tipo=Banco&observacao=
    
    echo $evento_id."---".$evento_nome."--".$evento_tipo."--".$observacao;

	$query = mysqli_query($conexao, "UPDATE evento SET evento_nome = '$evento_nome' ,evento_tipo = '$evento_tipo',observacao='$observacao' WHERE `evento_id` = '$evento_id';");






	/*

		header("location:cadastrar_evento.php");
		
		*/	

	
?>