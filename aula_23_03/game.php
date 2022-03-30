<?php

  session_start();

  if(!isset($_SESSION["jogador1"])) {
    if(isset($_POST["jogador1"])) {
      $_SESSION["jogador1"] = $_POST["jogador1"];
    } else 
    {
      header('location: index.php');
    }
  }

  if(!isset($_SESSION["jogador2"])) {
    if(isset($_POST["jogador2"])) {
      $_SESSION["jogador2"] = $_POST["jogador2"];
    } else 
    {
      header('location: index.php');
    }
  }

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
          $_SESSION["campos"][$campo] = "x";
        else
          $_SESSION["campos"][$campo] = "o";
        $_SESSION["error"] = false;
      }
    }
  }

  function verificarVencedor($sinal) {
    if(
      ($_SESSION["campos"]["campo1"] == $sinal && $_SESSION["campos"]["campo2"] == $sinal && $_SESSION["campos"]["campo3"] == $sinal) ||
      ($_SESSION["campos"]["campo1"] == $sinal && $_SESSION["campos"]["campo5"] == $sinal && $_SESSION["campos"]["campo9"] == $sinal) ||
      ($_SESSION["campos"]["campo1"] == $sinal && $_SESSION["campos"]["campo4"] == $sinal && $_SESSION["campos"]["campo7"] == $sinal) ||
      ($_SESSION["campos"]["campo2"] == $sinal && $_SESSION["campos"]["campo5"] == $sinal && $_SESSION["campos"]["campo8"] == $sinal) ||
      ($_SESSION["campos"]["campo3"] == $sinal && $_SESSION["campos"]["campo6"] == $sinal && $_SESSION["campos"]["campo9"] == $sinal) ||
      ($_SESSION["campos"]["campo3"] == $sinal && $_SESSION["campos"]["campo5"] == $sinal && $_SESSION["campos"]["campo7"] == $sinal) || 
      ($_SESSION["campos"]["campo7"] == $sinal && $_SESSION["campos"]["campo8"] == $sinal && $_SESSION["campos"]["campo9"] == $sinal) || 
      ($_SESSION["campos"]["campo4"] == $sinal && $_SESSION["campos"]["campo5"] == $sinal && $_SESSION["campos"]["campo6"] == $sinal)
    ) {
      $_SESSION["jogoTerminou"] = true;
      if($_SESSION["tentativas"] % 2 == 0)
        echo "<h2>" . $_SESSION["jogador1"] . " ganhou!</h2>";
      else
          echo "<h2>" . $_SESSION["jogador2"] . " ganhou!</h2>";
      $_SESSION["error"] = false;
      echo "<br><a href='index.php'>Iniciar novo jogo</a>";
      session_destroy();
      return true;
    } else {
      return false;
    }
  }

  for($i = 1; $i <= 9; $i++) {
    adicionarCampo("campo$i");
  }

  verificarVencedor("o");
  verificarVencedor("x");

  if($_SESSION["error"] == false) {
    $_SESSION["tentativas"]++;
  }

  if(!$_SESSION["jogoTerminou"]) {
    if($_SESSION["tentativas"] > 8 ) {
      session_destroy();
      $_SESSION["jogoTerminou"] = true;
      echo "<h2>Deu velha...</h2>";
      echo "<br><a href='index.php'>Iniciar novo jogo</a>";
    }  
  }
 
  include 'includes/header.php';

?>

  <header>
    <?php if(!$_SESSION["jogoTerminou"]): ?>
    <p>Vez de</p>
    <h2>
      <?php

      if($_SESSION["tentativas"] % 2 == 0) {
        echo $_SESSION["jogador1"];
      } else {
        echo $_SESSION["jogador2"];
      }

      ?>
    </h2>
    <?php endif ?>
  </header>

  <form class="game_form" action="game.php" method="post">
    <?php
    for($i = 1; $i <= 9; $i++) {
      echo"<button
          type='submit'
          name='campo$i'";
      if($_SESSION["jogoTerminou"] == true)
        echo 'disabled';
      echo ">";
      if($_SESSION["campos"]["campo$i"] != "")
        if($_SESSION["campos"]["campo$i"] == 'o')
          echo '<span class="symbol_container x_char">&#xD7</span>';
        else
          echo '<span class="symbol_container circle">o</span>';
      echo '</button>';
    }

    ?>
  </form>

<?php

  include 'includes/footer.php';

?>