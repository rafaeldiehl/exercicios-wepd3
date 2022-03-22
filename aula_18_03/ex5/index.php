<?php
  include 'includes/header.php';
?>

  <header>
    <img src="assets/img/salario.png" alt="Salário">
    <h1>Reajuste de salário</h1>
    <p>Preencha os campos abaixo e verifique seu novo salário</p>
  </header>

  <form action="result.php" method="post">
    <div class="input_container">
      <label for="nome">Nome</label>
      <input type="text" name="nome" placeholder="Informe seu nome" />
    </div>
    <div class="input_container">
      <label for="cargo">Cargo</label>
      <input type="text" name="cargo" placeholder="Informe seu cargo" />
    </div>
    <div class="input_container">
      <label for="salario">Salário</label>
      <input type="number" name="salario" min="0" step="0.01" placeholder="Informe seu salário" />
    </div>
    <button disabled type="submit" class="submit_btn">Calcular reajuste</button>
  </form>
  <script>
    const inputs = document.querySelectorAll(".input_container input");
    const button = document.querySelector(".submit_btn");

    validInputs = false;

    inputs.forEach((input) => {
      input.addEventListener('change', () => {
        validInputs = Array.from(inputs).filter((input) => input.value !== "");
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