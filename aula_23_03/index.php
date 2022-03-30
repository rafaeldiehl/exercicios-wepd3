<?php

  include 'includes/header.php';

?>

  <main>
    <header class="index_header">
      <h1>Jogo da Velha</h1>
      <p>Escolha seu lado e inicie um jogo!</p>
    </header>
    
    <form class="player_form" action="game.php" method="post">
      <div class="input_container">
        <span class="symbol_container circle">o</span>
        <input name="jogador1" type="text" placeholder="Nome do Jogador" />
      </div>
      <div class="input_container">
        <span class="symbol_container x_char">&#xD7</span>
        <input name="jogador2" type="text" placeholder="Nome do Jogador" />
      </div>
      <button disabled type="submit" class="submit_btn">Jogar</button>
    </form>
  </main>

  <script>
    const inputs = document.querySelectorAll(".input_container input");
    const button = document.querySelector(".submit_btn");

    validInputs = false;

    console.log(button);
    console.log(inputs);

    inputs.forEach((input) => {
      input.addEventListener('change', () => {
        validInputs = Array.from(inputs).filter((input) => input.value !== "");

        if(validInputs.length != inputs.length) {
          button.setAttribute("disabled", true);
        } else {
          button.removeAttribute("disabled");
        }
      });
    });
  </script>


<?php

  include 'includes/footer.php';

?>