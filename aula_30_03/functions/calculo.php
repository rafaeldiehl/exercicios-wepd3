<?php 

  function calcularSalarioLiquido($salario, $vale1, $vale2) {
    if ($salario < 2000)
      $pDesconto = 0;
    else if ($salario >= 2000 && $salario < 3500)
      $pDesconto = 0.075;
    else if ($salario >= 3500 && $salario < 5000)
      $pDesconto = 0.1;
    else if ($salario >= 5000 && $salario < 7000)
      $pDesconto = 0.125;
    else
      $pDesconto = 0.15;

    return $salario - ($salario * $pDesconto) + $vale1 + $vale2;
  }

?>

