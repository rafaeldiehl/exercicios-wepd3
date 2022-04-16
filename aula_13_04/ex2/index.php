<?php 

	session_start();

  $nomes = array(
    "nome1" => "",
    "nome2" => "",
    "nome3" => "",
    "nome4" => "",
    "nome5" => ""
  );

  $error = false;

	$parametros_esperados = ["nome1", "nome2", "nome3", "nome4", "nome5"];
  $parametros_recebidos = array_keys($_POST);
  $diferencas = array_diff($parametros_esperados, $parametros_recebidos);

  if(!empty($diferencas)) {
    $error = true;
  } else {
    $nomes = array(
      "nome1" => $_POST["nome1"],
      "nome2" => $_POST["nome2"],
      "nome3" => $_POST["nome3"],
      "nome4" => $_POST["nome4"],
      "nome5" => $_POST["nome5"]
    );

    foreach($nomes as $value) 
      if($value == "")
        $error = true;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ordem Alfabética</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="styles/css/main.css">
</head>
<body>
  <div class="form-container">
    <header>
      <h1>Ordem alfabética</h1>
      <p>Preencha cinco nomes abaixo e ordene-os como preferir</p>
    </header>

    <form action="index.php" method="post">
      <p class="input-container">
        <label for="nome1">Primeiro nome</label>
        <input name="nome1" type="text" value="<?= $nomes["nome1"]; ?>" />
      </p>
      <p class="input-container">
        <label for="nome2">Segundo nome</label>
        <input name="nome2" type="text" value="<?= $nomes["nome2"]; ?>" >
      </p>
      <p class="input-container">
        <label for="nome3">Terceiro nome</label>
        <input name="nome3" type="text" value="<?= $nomes["nome3"]; ?>" >
      </p>
      <p class="input-container">
        <label for="nome4">Quarto nome</label>
        <input name="nome4" type="text" value="<?= $nomes["nome4"]; ?>" >
      </p>
      <p class="input-container">
        <label for="nome5">Quinto nome</label>
        <input name="nome5" type="text" value="<?= $nomes["nome5"]; ?>" >
      </p>
      <p class="button-container">
        <button name="sort" type="submit">
          <i class="bi bi-sort-alpha-down"></i>
          Ordenar de A-Z
        </button>
        <button name="sort-reverse" type="submit">
          <i class="bi bi-sort-alpha-down-alt"></i>
          Ordenar de Z-A
        </button>
      </p>
    </form>

    <hr>
  </div>



  <div class="result-container">
  <?php

  if((isset($_POST["sort"]) || isset($_POST["sort-reverse"])) && !$error) {
    echo '<ol>';
    if(isset($_POST["sort"])) {
      sort($nomes);
      foreach($nomes as $value) {
        echo "<li>$value</li>";
      }
    }

    if(isset($_POST["sort-reverse"])) {
      rsort($nomes);
      foreach($nomes as $value) {
        echo "<li>$value</li>";
      }
    }
    echo '</ol>'; 

  } else {
    echo "<p class='none'><i class='bi bi-exclamation-octagon-fill'></i> Nenhum nome informado até o momento</p>";
  }

  ?>
  </div>
    

</body>
</html>
