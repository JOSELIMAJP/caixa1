
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta charset="utf-8">
    <title>Caixa1 - Gestao Financeira</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script language="javascript">
function valida(){
   var campo = document.getElementById("valor");
   if(campo.value == ""){
       alert("Campo valor obrigatorio!");
       return false;
   } 
   return true;
}
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <nav>
      <div class="logo">CAIXA1 </div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="pag_inicial2.php">Inicio</a></li>
        <li><a href="movimentos_lancar.php">Lançar Movimento</a></li>
        <li><a href="movimentos_list.php">Movimentos</a></li>
        <li><a href="movimentos_list.php">Resumo</a></li>
        <li><a href="#">Cadastro eventos</a></li>
        <li><a href="#">Cadastro usuarios</a></li>
        <li><a href="#">Sair</a></li>
      </ul>
    </nav>
    <div class="content">
      <div>
      
	  
	  <html>
<head>
                <?php         
   include("../conexao.php");

    
      $sql = mysqli_query($conexao,"SELECT SUM(movimentos_db-movimentos_cr) as Saldo FROM movimentos_saldo where `movimentos_evento`like('despesa%')");
        
              while($dados=mysqli_fetch_assoc($sql)){ $despesas= $dados['Saldo'];}
    
      $sql = mysqli_query($conexao,"SELECT SUM(movimentos_db-movimentos_cr) as Saldo FROM movimentos_saldo where `movimentos_evento`like('receita%')");
        
              while($dados=mysqli_fetch_assoc($sql)){ $receitas= $dados['Saldo'];}
    
          $sql = mysqli_query($conexao,"SELECT SUM(movimentos_db-movimentos_cr) as Saldo FROM movimentos_saldo where `movimentos_evento`like('investimento%')");
        
              while($dados=mysqli_fetch_assoc($sql)){ $investimento= $dados['Saldo'];}
              
              echo "<br>";
              echo "<br>";
              echo "<br>";
              echo "<br>";
              
              /*
              
              echo "Receitas:".$receitas = (number_format($receitas, 2, '.', ''))."<br>";
              echo "Despesas:".$despesas = (number_format($despesas, 2, '.', ''))."<br>";
              echo "Investimento:".$investimento = (number_format($investimento, 2, '.', ''))."<br>";
            
              //$total=-($receitas)+$despesas+$investimento;
              
              //echo $total;
              */
   ?>
    



    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Task', '<?php ?>'],
          ['Receitas',<?php echo $receitas = -(number_format($receitas, 2, '.', '')); ?>],
          ['Despesas',<?php echo $despesas = (number_format($despesas, 2, '.', '')); ?>],
        ]);

        var options = {
          title: 'Receitas x Despesas',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      

   
    <div id="piechart_3d"></div>
  </body>
</html>
	  
	  
	  
	  
      </div>
    </div>
  </body>
</html>