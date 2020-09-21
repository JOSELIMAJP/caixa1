    <?php
    $nome = $_POST["data"];
    $preco = $_POST["debito"];
    
    
    
    /*
    
    $query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
    
    $conexao = mysqli_connect('localhost', 'root', '', 'loja');
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    
    */
    ?>
    <p class="alert-success">
        Produto: <?= $nome; ?>, preco: <?= $preco; ?> - adicionado com sucesso!
    </p>