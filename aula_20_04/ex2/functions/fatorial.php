<?php

  function fatorial($num) {
    $result = 1;
    while($num > 0) {
      $result *= $num;
      $num--;
    }
    return $result;
  }

?>