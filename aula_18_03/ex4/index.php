<?php
  include 'includes/header.php';
?>

  <main>
    <div class="logo">
      <img src="assets/img/chapeu.png" alt="Chapéu de Graduação" />
    </div>
    <h1>
      Média de Notas
    </h1>
    <p>Insira suas notas nos campos abaixo</p>
    <form action="result.php" method="post">
      <div class="inputs_container">
        <div class="input_container">
          <input step="0.01" name="nota1" type="number" placeholder="Ex: 6" min="0" max="10" />
          <label for="nota1">Primeira Nota</label>
        </div>
        <div class="input_container">
          <input step="0.01" name="nota2" type="number" placeholder="Ex: 6" min="0" max="10" />
          <label for="nota2">Segunda Nota</label>
        </div>
        <div class="input_container">
          <input step="0.01" name="nota3" type="number" placeholder="Ex: 6" min="0" max="10" />
          <label for="nota3">Terceira Nota</label>
        </div>
        <div class="input_container">
          <input step="0.01" name="nota4" type="number" placeholder="Ex: 6" min="0" max="10" />
          <label for="nota4">Quarta Nota</label>
        </div>
      </div>
      <button class="submit_btn" disabled type="submit">
        Calcular média
      </button>
    </form>
  </main>

  <script>
    const inputs = document.querySelectorAll(".input_container input");
    const button = document.querySelector(".submit_btn");

    validInputs = false;

    inputs.forEach((input) => {
      input.addEventListener('change', () => {
        validInputs = Array.from(inputs).filter((input) => input.value !== "" && !(isNaN(input.value)));
        console.log(validInputs);

        if(validInputs.length != inputs.length) {
          button.setAttribute("disabled", true);
        } else {
          button.removeAttribute("disabled");
        }
      });
    })

  </script>

<?php
  include 'includes/footer.php';
?>