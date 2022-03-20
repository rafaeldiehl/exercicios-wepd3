<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Rafael Juliani Diehl" />
  <meta name="description" content="Exercício 1: Página que converte de Celsius para Fahrenheit" />
  <title>Celsius para Fahrenheit</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="assets/img/termometro.png" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
  <main>
    <section class="container left">
      <header>
        <img class="logo" src="assets/img/termometro.png" alt="Termômetro" />
        <h1>Celsius para Fahrenheit</h1>
        <p>Preencha o campo abaixo e converta uma temperatura de Celsius para Fahrenheit</p>
      </header>
      <form action="index.php" method="post">
        <div class="celsius_input">
          <input step="0.01" name="celsius" type="number" placeholder="100">
          <label for="number">
            Temperatura em Celsius
          </label>
          <span>°C</span>
        </div>
        <button class="submit_btn" disabled>Converter para Fahrenheit</button>
      </form>
    </section>
    <section class="container right">
      <?php
        if(isset($_POST["celsius"])) {
          $celsius = $_POST["celsius"];
          echo "<div class='result'><p class='type'>Celsius</p><p class='number'>" . $celsius . "°C</p></div>";
          echo "<div class='result'><p class='type'>Fahrenheit</p><p class='number'>" . celsiusParaFahrenheit($celsius) . "°F</p></div>";
          // quanto está no mobile, scrolla até o fim da página após processar a resposta
          echo "<script>window.scrollTo(0, document.body.scrollHeight);</script>";
        }
        else {
          // svg com animação de loading (fonte: https://codepen.io/aurer/pen/ZEJxpO)
          echo '<div class="loader loader--style2" title="1">
            <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              width="80px" height="80px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
            <path fill="#fff" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
              <animateTransform attributeType="xml"
                attributeName="transform"
                type="rotate"
                from="0 25 25"
                to="360 25 25"
                dur="1s"
                repeatCount="indefinite"/>
              </path>
            </svg>
          </div>';
          echo "<p class='none'>Nenhuma temperatura foi informada</p>";
        }
      ?>
    </section>
  </main>
  <script>
    const input = document.querySelector(".celsius_input input");
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
  <?php

    function celsiusParaFahrenheit($celsius) {
      return floatval($celsius) * 1.8 + 32; // floatval() pra garantir que a resposta vai ser float
    }

  ?>
</body>
</html>