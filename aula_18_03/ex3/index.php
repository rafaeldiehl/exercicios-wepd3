<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Rafael Juliani Diehl" />
  <meta name="description" content="Exercício 3: Verifica se é divisível por 3 e 5" />
  <title>É Divisível?</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="shortcut icon" href="assets/img/divisao.png" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
  
  <form action="index.php" method="post">
    <label for="numero">Informe um número inteiro</label>
    <input class="input_num" name="numero" type="number" />
    <button disabled class="submit_btn" type="submit">Verificar se é divisível</button>
  </form>

  <?php  
    if(isset($_POST["numero"])) {
      echo "<div class='history'>";
      echo "<span class='material-icons'>
      history
      </span>";
      echo "Último número informado: ";
      echo "<b>" . $_POST["numero"] . "</b>";
      echo "</div>";
    }
  ?>


  <div class="result">
    <div class="number_container
    <?php
      if(isset($_POST["numero"]))
        if(ehDivisivel($_POST["numero"], 3))
          echo "true";
        else
          echo "false";
    ?>
    ">
      3
    </div>
    <div class="number_container
    <?php
      if(isset($_POST["numero"]))
        if(ehDivisivel($_POST["numero"], 5))
          echo "true";
        else
          echo "false";
    ?>
    ">
      5
    </div>
  </div>

  <div class="caption">
    <ul>
      <li><span class="circle grey"></span>Sem resposta</li>
      <li><span class="circle green"></span>É divísivel</li>
      <li><span class="circle red"></span>Não é divisível</li>
    </ul>
  </div>
  <script>
    const input = document.querySelector(".input_num");
    const button = document.querySelector(".submit_btn");

    // o botão só fica disponível pra submit quando o input tem valor numérico e não-nulo
    input.addEventListener("change", () => {
      if (input.value == "" || isNaN(input.value)) {
        button.setAttribute("disabled", true);
      } else {
        button.removeAttribute("disabled");
      }
    });
  </script>
</body>
<?php

  function ehDivisivel($numerador, $denominador) {
    if($numerador % $denominador == 0)
      return true;
    else
      return false;
  }

?>