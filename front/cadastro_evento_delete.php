<?php 
include("../conexao.php");
if(isset($_GET['delete_id'])){
	$id = $_GET['delete_id'];
	$query = mysqli_query($conexao, "DELETE FROM evento WHERE Evento_id = '$id'");
	if($query){
		header("location:cadastrar_evento.php");
	}else{
		echo "<script>alert('ocorreu erro, tente novamente!')</script>";
	}
}

 ?>