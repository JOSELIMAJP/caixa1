<?php 
include("../conexao.php");
if(isset($_GET['delete_id'])){
	$id = $_GET['delete_id'];
	$query = mysqli_query($conexao, "DELETE FROM movimentos WHERE movimentos_id = '$id'");
	if($query){
		header("location:movimentos_list.php");
	}else{
		echo "<script>alert('ocorreu erro, tente novamente!')</script>";
	}
}

 ?>