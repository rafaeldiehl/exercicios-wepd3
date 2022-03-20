<?php
  include 'includes/header.php';
?>

<div class="description_container">
  <h2>Calcular preço</h2>
  <p>Calcule a quantidade de latas necessárias e o preço, com base na área que será pintada. 
  A cobertura da tinta é de <b>1 L</b> para cada <b>3 m²</b> e a tinta
  é vendida em latas de <b>18 L</b>, que custam <b>R$ 210,00</b>.</p>
</div>

<div class="form_container">
  <form action="result.php" method="post">
    <label for="area">Informe o tamanho da área em m²</label>
    <input step="0.01" class="area_input" name="area" type="number" placeholder="Ex: 100" />
    <button class="submit_btn" type="submit" disabled>
      <span class="material-icons">
        arrow_forward
      </span>
    </button>
  </form>
</div>
</main>
<script>
const input = document.querySelector(".area_input");
const button = document.querySelector(".submit_btn");

// o botão só fica disponível pra submit quando o input tem valor numérico e não-nulo
input.addEventListener("change", () => {
  if (input.value == "" || isNaN(input.value) || input.value <= 0) {
    button.setAttribute("disabled", true);
  } else {
    button.removeAttribute("disabled");
  }
});
</script>

<?php
  include 'includes/footer.php';
?>