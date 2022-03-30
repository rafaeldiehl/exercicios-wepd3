<?php 

  require_once 'functions/calculo.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aula 30/03</title>
</head>
<body>

  <form action="index.php" method="post">
    <input name="nome" type="text" placeholder="Nome" />
    <input name="idade" type="number" placeholder="Idade" min="0" />
    <input name="salario" type="number" placeholder="Salário" step="0.01" min="0.00" />
    <input name="vale_alimentacao" placeholder="Vale Alimentação" type="number" step="0.01" min="0.00" />
    <input name="vale_transporte" placeholder="Vale Transporte" type="number" step="0.01" min="0.00" />
    <button type="submit">Calcular salário bruto</button>
  </form>

  <?php 
  
  $parametros = ["nome", "idade", "salario", "vale_alimentacao", "vale_transporte"];
  $parametros_post = array_keys($_POST);
  $parametros_faltando = array_diff($parametros, $parametros_post);

  if(empty($parametros_faltando)) {

    $func = array(
      "nome" => $_POST["nome"], 
      "idade" => $_POST["idade"],
      "salario" => $_POST["salario"],
      "vale_alimentacao" => $_POST["vale_alimentacao"],
      "vale_transporte" => $_POST["vale_transporte"]
    );

    $func["salario_liquido"] = calcularSalarioLiquido($func["salario"], $func["vale_alimentacao"], $func["vale_transporte"]);

    echo "<ul>";
    foreach($func as $chave => $valor) {
      echo "<li>$chave: $valor</li>";
    }
    echo "</ul>";

  }
  
  ?>

</body>
</html>