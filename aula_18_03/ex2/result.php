<?php

  if(!isset($_POST["area"]))
    header('Location: index.php');

  include 'includes/header.php';
?>

<div class="result_container">
  <div class="description_container result_description">
    <h2>Resultado</h2>
    <p>Com base na área informada, obtemos os seguintes dados.</p>
  </div>

  <div class="result">
    <ul>
      <?php
        $area = $_POST["area"];
        $result = compraTinta($area);

        foreach($result as $chave => $valor) {
          echo "<li>";
          echo "<span class='name'>" . $chave . "</span>";

          echo "<span class='value ";
            if($chave == "Valor Total")
              echo "value_bold ";
          echo "'>" . $valor;

          if($chave == "Latas Necessárias") {
            if($valor > 1)
              echo " latas";
            else
              echo " lata";
          } 

          echo "</span>";


          echo "</li>";
          if($chave == "Latas Necessárias")
            echo "<hr>";
        }
      ?>
    </ul>

    <div class="button_container">
      <button class="btn">
        <a href="index.php">
          Voltar para o início
        </a>
      </button>

      <button class="btn confirm">
        Confirmar compra
        <span class="material-icons">
            arrow_forward
        </span>
      </button>
    </div>
  </div>
</div>

<?php

  include 'includes/footer.php';

  function compraTinta($area) {
    $valor_lata = 210;
    $litros = ceil(floatval($area)/3); // 1 litro = 3 m²
    $total_latas = ceil($litros/18); // 1 lata = 18 L
    $valor_total = $total_latas * $valor_lata;
    return array(
      "Área" => $area . " m²",
      "Total de Litros" => $litros . " L",
      "Latas Necessárias" => $total_latas,
      "Valor Total" => "R$ " . number_format((float)$valor_total, 2, ',', ''),
    );
  }

?>