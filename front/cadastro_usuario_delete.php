<?php 
include("../conexao.php");
if(isset($_GET['delete_id'])){
	$id = $_GET['delete_id'];
	$query = mysqli_query($conexao, "DELETE FROM usuario WHERE usuario_id = '$id'");
	if($query){
		header("location:cadastro_usuario.php");
	}else{
		echo "<script>alert('ocorreu erro, tente novamente!')</script>";
	}
}

 ?>