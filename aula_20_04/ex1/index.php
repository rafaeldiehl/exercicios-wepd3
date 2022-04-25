<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maioridade</title>
  <link rel="stylesheet" href="styles/css/main.css" />
  <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
  <form action="index.php" method="get">
    <div class="field">
      <label for="nome">Nome</label>
      <input name="nome" type="text" value="<?
        if(isset($_GET["nome"])) {
          echo $_GET["nome"];
        }
      ?>"/>
    </div>
    <div class="field">
      <label for="idade">Idade</label>
      <input name="idade" type="number" min="0" step="0" value="<?
        if(isset($_GET["idade"])) {
          echo $_GET["idade"];
        }
      ?>"/>
    </div>
    <button type="submit">Verificar maioridade</button>
    <div class="result">
      <?php
      
        $error = true;

        if(isset($_GET["nome"]) && isset($_GET["idade"])) 
          if($_GET["nome"] != "" && $_GET["idade"] != "")
            $error = false;

        if(!$error):
        ?>
      <div class="message-box">
        <span class="material-symbols-outlined">
        face
        </span>
        <?php
          echo $_GET["nome"] . ", você é ";
          if($_GET["idade"] > 18) {
            echo "maior";
          } else {
            echo "menor";
          }
          echo " de idade.";
        ?>
      </div>
      <?php
        elseif(isset($_GET["nome"]) && isset($_GET["idade"])):
      ?>
      <div class="message-box error">
        <span class="material-symbols-outlined">
          report
        </span>
        Preencha os dois campos!
      </div>
      <?php
        endif;
      ?>
    </div>
  </form>
</body>
</html>