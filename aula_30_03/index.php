<?php 

  require_once 'functions/calculo.php';

  $parametros = ["nome", "idade", "salario", "vale_alimentacao", "vale_transporte"];
  $parametros_post = array_keys($_POST);
  $parametros_faltando = array_diff($parametros, $parametros_post);

  $func = array(
    "nome" => "", 
    "idade" => "",
    "salario" => "",
    "vale_alimentacao" => "",
    "vale_transporte" => ""
  );

  if(empty($parametros_faltando)) {
    $func = array(
      "nome" => $_POST["nome"], 
      "idade" => $_POST["idade"],
      "salario" => $_POST["salario"],
      "vale_alimentacao" => $_POST["vale_alimentacao"],
      "vale_transporte" => $_POST["vale_transporte"]
    );

    $func["salario_liquido"] = calcularSalarioLiquido($func["salario"], $func["vale_alimentacao"], $func["vale_transporte"]);
  }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aula 30/03</title>
  <link rel="stylesheet" href="styles/css/main.css" />
</head>
<body>

  <div class="outside"></div>
  <div class="outside"></div>
  <div class="container">


    <header>
      <h1>Calcular salário líquido</h1>
      <p>Preencha os campos abaixo para calcular seu salário líquido.</p>
    </header>

    <form action="index.php" method="post">
      <p>
        <input name="nome" type="text" placeholder="Nome" value="<?= $func["nome"]; ?>" />
      </p>
      <p>
        <input name="idade" type="number" placeholder="Idade" min="0" value="<?= $func["idade"]; ?>" />
        <input name="salario" type="number" placeholder="Salário" step="0.01" min="0.00" value="<?= $func["salario"]; ?>" />
      </p>
      <p>
        <input name="vale_alimentacao" placeholder="Vale Alimentação" type="number" step="0.01" min="0.00" value="<?= $func["vale_alimentacao"]; ?>" />
        <input name="vale_transporte" placeholder="Vale Transporte" type="number" step="0.01" min="0.00" value="<?= $func["vale_transporte"]; ?>" />
      </p>
      <p>
        <button disabled type="submit">Calcular salário líquido</button>
      </p>
 
    </form>

    <div class="result">
      <?php
        if(empty($parametros_faltando)) {
          echo "<p>Seu salário liquído é R$ <b>" . number_format((float)$func["salario_liquido"], 2, ',', '') . "</b></p>";
        } else {
          echo "<p>Aguardando os dados...</p>";
        }
      ?>
    </div>
  </div>

  <script src="scripts/validate.js"></script>
</body>
</html>