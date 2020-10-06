    <html>
<head>
<title>window.location</title>
<script type="text/javascript">
	alert("OK - Movimento registrado");
	//window.location="http://www.devmedia.com.br/";
</script>
</head>
<body>
       
    
    
    <?php
    include("conexao.php");
   /* 
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
    
    */
    
    /*
    movimentos_id
    movimentos_data
    movimentos_evento
    movimentos_valor_d
    movimentos_valor_c
    movimentos_obs
    
    */
    
    
    $data = $_POST["data"];
    $debito = $_POST["debito"];
    $credito = $_POST["credito"]; 
    $valor = $_POST["valor"];
    $observacao = $_POST["observacao"];
 
    $query = "insert into movimentos (movimentos_id,movimentos_data,movimentos_evento_d,movimentos_evento_c,movimentos_valor,movimentos_obs) values (null,'$data','$debito','$credito','$valor','$observacao')";

    mysqli_query($conexao, $query);
    

/*
	
movimentos_id
movimentos_data

movimentos_evento_d
movimentos_evento_c
movimentos_obs
movimentos_valor


*/

    
//Função para redirecionar a página para o link
function redireciona($link){
     if ($link==-1){
     echo" <script>history.go(-1);</script>";
     }else{
     echo" <script>document.location.href='$link'</script>";
     }
 };
//Cria uma variavel
$link = 'lancarMovimento.php';

//E aonde quiser chama a função dentro de um if ou qualquer coisa.

// Chama a função
redireciona($link); 
    
    /*

    $query = "insert into movimentos (movimentos_id,movimentos_data,movimentos_evento,movimentos_valor_d,movimentos_valor_c,movimentos_obs) values (null,'$data','$credito',0,'$valor','$observacao')";
    
    mysqli_query($conexao, $query);
    
    */
    
    
    /*mysqli_close($conexao);   */
    
    
    /*
    
    $query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
    
    $conexao = mysqli_connect('localhost', 'root', '', 'loja');
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    
    */

//echo "data:".$data."<BR/>"."debito:".$debito."<BR/>"."credito:".$credito."<BR/>"."valor:".$valor."<BR/>"."observacao:".$observacao."<BR/>";



    ?>
    
        <script>
function funcao1()
{
alert("Eu sou um alert!");
}
</script> 
    
    
    
</body>
</html>

