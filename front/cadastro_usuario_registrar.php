    <html>
<head>
<title>window.location</title>
<script type="text/javascript">
</script>
</head>
<body>
           
    <?php
include("../conexao.php"); 
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $query = "insert into usuario (usuario_id,usuario,senha) values (NULL,'$usuario',md5('$senha'))";

    mysqli_query($conexao, $query);
             
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

//E aonde quiser chama a função dentro de um if ou qualquer coisa.

// Chama a função
redireciona($link); 
    

    ?>
    
        <script>
function funcao1()
{
alert("Eu sou um alert!");
}
</script>   
</body>
</html>

