<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Número positivo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="styles/css/main.css" />
</head>
<body>
  <div class="container">

    <header>
      <h1>Insira um número positivo</h1>
    </header>

    <form action="index.php" method="post">
      <input name="num" type="number" value="<?php if(isset($_POST["num"])) echo $_POST["num"];?>" />
      <button type="submit">
        <span class="material-symbols-outlined">
        arrow_forward
        </span>
      </button>
    </form>

    <div class="result">
    <?php
    if(isset($_POST["num"]) && $_POST["num"] != 0) {
      $num = $_POST["num"];
      if($num < 0) {
        echo "<p>O número digitado é inválido. Redigite!</p>";
      } else {
        require_once "functions/fatorial.php";
        echo "<p class='fatorial'>$num! = " . fatorial($num) . "</p>";
      }

    }
    ?>
    </div>
  </div>

</body>
</html>