<?php

  $parametros = ["nota1", "nota2", "nota3", "nota4"];
  $parametros_post = array_keys($_POST);
  $parametros_faltando = array_diff($parametros, $parametros_post);

  if(!empty($parametros_faltando)) {
    header('Location: index.php');
  }

  function media($notas) {
    return array_sum($notas)/count($notas);
  }

  $media = media($_POST);

  include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="result">
    <h1>
    <?php
      if($media >= 6) 
        echo "APROVADO";
      else
        echo "REPROVADO";
    ?>
    </h1>
    <p>Sua média final é
    <?php
      echo "<b>" . $media . "</b>";
    ?>
    </p>
    <img class="img" src="assets/img/<?php
      if($media >= 6) 
        echo "aprovado";
      else
        echo "reprovado";
    ?>.gif" alt="Aprovado" />
  </div> 

  <audio class="som-aprovado" src="assets/audio/aprovado.mp3"></audio>
  <audio class="som-reprovado" src="assets/audio/reprovado.mp3"></audio>
  
  <?php
      if($media >= 6) {
        echo '<script src="assets/js/confetti.js"></script>';
        echo "<script>";
        echo "document.querySelector('.som-aprovado').play();
              startConfetti();
              setTimeout(stopConfetti, 1000 * 60);";
        echo "</script>";
      }
      else {
        echo "<div class='red-screen'></div>";
        echo '<div class="rain front-row"></div>';
        echo '<div class="rain back-row"></div>';
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
        echo '<script src="assets/js/rain.js"></script>';
        echo "<script>";
        echo "document.querySelector('.som-reprovado').play();
              const redScreen = document.querySelector('.red-screen')";
        echo "</script>";
      }

      include 'includes/footer.php';
  ?>