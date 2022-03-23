<?php
  session_start();

  if(!isset($_SESSION["tentativas"])) { 
    $_SESSION["tentativas"] = 0;
  };

  if($_SESSION["tentativas"] == 0) {
    $_SESSION["campos"] = array(
      "campo1" => "",
      "campo2" => "",
      "campo3" => "",
      "campo4" => "",
      "campo5" => "",
      "campo6" => "",
      "campo7" => "",
      "campo8" => "",
      "campo9" => "",
    );
  }
  
  $_SESSION["jogoTerminou"] = false;
  $_SESSION["error"] = true;

  function adicionarCampo($campo) {
    if(isset($_POST[$campo])) {
      if($_SESSION["campos"][$campo] == "") {
        if($_SESSION["tentativas"] % 2 == 0)
          $_SESSION["campos"][$campo] = "o";
        else
          $_SESSION["campos"][$campo] = "x";
        $_SESSION["error"] = false;
      }
    }
  }

  function verificarVencedor($sinal) {
    if(
      $_SESSION["campos"]["campo1"] == $sinal && $_SESSION["campos"]["campo2"] == $sinal && $_SESSION["campos"]["campo3"] == $sinal ||
      $_SESSION["campos"]["campo1"] == $sinal && $_SESSION["campos"]["campo5"] == $sinal && $_SESSION["campos"]["campo9"] == $sinal ||
      $_SESSION["campos"]["campo1"] == $sinal && $_SESSION["campos"]["campo4"] == $sinal && $_SESSION["campos"]["campo7"] == $sinal ||
      $_SESSION["campos"]["campo2"] == $sinal && $_SESSION["campos"]["campo5"] == $sinal && $_SESSION["campos"]["campo8"] == $sinal ||
      $_SESSION["campos"]["campo3"] == $sinal && $_SESSION["campos"]["campo6"] == $sinal && $_SESSION["campos"]["campo9"] == $sinal ||
      $_SESSION["campos"]["campo3"] == $sinal && $_SESSION["campos"]["campo5"] == $sinal && $_SESSION["campos"]["campo7"] == $sinal || 
      $_SESSION["campos"]["campo7"] == $sinal && $_SESSION["campos"]["campo8"] == $sinal && $_SESSION["campos"]["campo9"] == $sinal || 
      $_SESSION["campos"]["campo4"] == $sinal && $_SESSION["campos"]["campo5"] == $sinal && $_SESSION["campos"]["campo6"] == $sinal
    ) {
      session_destroy();
      $_SESSION["jogoTerminou"] = true;
      echo "<br>O jogador" . $sinal . " ganhou!";
      echo "<br><a href='index.php'>Iniciar novo jogo</a>";
    }
  }

  for($i = 1; $i <= 9; $i++) {
    adicionarCampo("campo$i");
  }

  if($_SESSION["tentativas"] % 2 == 0) {
    echo 'vez do x';
  } else {
    echo 'vez do o';
  }

  verificarVencedor("x");
  verificarVencedor("o");

  if($_SESSION["error"] == false) {
    $_SESSION["tentativas"]++;
  }

  if($_SESSION["tentativas"] > 8) { // corrigir quando o e x vencem na tentativa 9
    session_destroy();
    $_SESSION["jogoTerminou"] = true;
    echo "<br>Deu velha...";
    echo "<br><a href='index.php'>Iniciar novo jogo</a>";
  }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jogo da Velha</title>
</head>
<body>

  <form action="index.php" method="post">
    <input type="submit" name="campo1" value="<?php if($_SESSION["campos"]["campo1"] != "") echo $_SESSION["campos"]["campo1"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> />
    <input type="submit" name="campo2" value="<?php if($_SESSION["campos"]["campo2"] != "") echo $_SESSION["campos"]["campo2"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> />
    <input type="submit" name="campo3" value="<?php if($_SESSION["campos"]["campo3"] != "") echo $_SESSION["campos"]["campo3"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> /> <br>
    <input type="submit" name="campo4" value="<?php if($_SESSION["campos"]["campo4"] != "") echo $_SESSION["campos"]["campo4"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> />
    <input type="submit" name="campo5" value="<?php if($_SESSION["campos"]["campo5"] != "") echo $_SESSION["campos"]["campo5"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> />
    <input type="submit" name="campo6" value="<?php if($_SESSION["campos"]["campo6"] != "") echo $_SESSION["campos"]["campo6"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> /> <br>
    <input type="submit" name="campo7" value="<?php if($_SESSION["campos"]["campo7"] != "") echo $_SESSION["campos"]["campo7"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> /> 
    <input type="submit" name="campo8" value="<?php if($_SESSION["campos"]["campo8"] != "") echo $_SESSION["campos"]["campo8"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> />
    <input type="submit" name="campo9" value="<?php if($_SESSION["campos"]["campo9"] != "") echo $_SESSION["campos"]["campo9"]; ?>" <?php if($_SESSION["jogoTerminou"] == true) echo 'disabled'; ?> />
  </form>
</body>
</html>