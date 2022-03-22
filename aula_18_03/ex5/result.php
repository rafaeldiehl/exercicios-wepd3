<?php

  $parametros = ["nome", "cargo", "salario"];
  $parametros_post = array_keys($_POST);
  $parametros_faltando = array_diff($parametros, $parametros_post);

  if(!empty($parametros_faltando)) {
    header('Location: index.php');
  }

  function reajusteSalario($salario) {
    $salario = floatval($salario);
    if($salario < 2000) {
      $salario += ($salario * 0.5);
    } else if($salario < 6000) {
      $salario += ($salario * 0.4);
    } else {
      for($i = 0; $i < 3; $i++) {
        $salario += ($salario * 0.1);
      }
    }
    return $salario;
  }

  include 'includes/header.php';
?>

  <div class="result">
    <header>
      <h1>Resultado</h1>
      <p>Com base nos dados informados, calculamos o reajuste</p>
    </header>
    <ul>
      <li>
        <span class="name">Nome</span>
        <span class="value"><?php echo $_POST["nome"] ?></span>
      </li>
      <li>
        <span class="name">Cargo</span>
        <span class="value"><?php echo $_POST["cargo"] ?></span>
      </li>
      <li>
        <span class="name">Salário</span>
        <span class="value">
          <?php
           echo "R$" . number_format((float)$_POST["salario"], 2, ',', '');
          ?>
        </span>
      </li>
      <hr>
      <li>
        <span class="name">Novo Salário</span>
        <span class="value novo">
        <?php
          echo "R$" . number_format((float)reajusteSalario($_POST["salario"]), 2, ',', '');
        ?>
        </span>
      </li>
    </ul>

  </div>
  </div>


<?php
  include 'includes/footer.php';
?>