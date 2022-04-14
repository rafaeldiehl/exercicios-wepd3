<?php 

    session_start();

    if(!isset($_SESSION["arr"])) {
        $_SESSION["arr"] = array();
    } else if(isset($_POST["number"]) && $_POST["number"] != "") {
        array_push($_SESSION["arr"], $_POST["number"]);
    }

    function retornaMaiorMenor($arr) {
        $newArr = array();
        foreach($arr as $key => $value) {
            if($key == 0) {
                $newArr["maior"] = $value;
                $newArr["menor"] = $value;
            } else {
                if($value > $newArr["maior"]) {
                    $newArr["maior"] = $value;
                } else if ($value < $newArr["menor"]) {
                    $newArr["menor"] = $value;
                }
            }
        }
        return $newArr;
    }

    function retornaMinMax($arr) {
        return array(
            "maior" => max($arr),
            "menor"=> min($arr)
        );
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maior e Menor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Maior e Menor</h1>
            <p>Insira valores num vetor e veja quais deles são o maior e o menor.</p>
        </header>

        <hr />

        <form action="index.php" method="post">
            <label for="number">Insira um número para o array</label>
            <input name="number" type="number" placeholder="ex: 10" />
            <button type="submit">
                <span class="material-icons md-36">
                    arrow_circle_right
                </span>
            </button>
        </form>

        <?php 
              
            if(empty($_SESSION["arr"])):
                
        ?>

            <div class="no-number">
                <span class="material-icons">
                    error
                </span>
                Nenhum número adicionado no momento
            </div>

        <?php 
            else:
        ?>

            <div class="result-container">
                <div class="array">
                    <h3>Vetor</h3>
                    <div class="values">
                        <?php
                            foreach($_SESSION["arr"] as $value) {
                                echo "<li>$value</li>";
                            }
                        ?>
                    </div>
                </div>
                <div class="min-max">
                    <?php
                        foreach(retornaMaiorMenor($_SESSION["arr"]) as $key => $value) {
                            echo "<p style='text-transform: capitalize'><b>$key</b>: $value</p>";
                        }
                    ?>
                </div>
            </div>

            <div class="link-container">
                <a href="clear.php">
                    <span class="material-icons">
                        delete
                    </span>    
                    Limpar array
                </a>
            </div>

        <?php
            endif;      
        ?>

       
    </div>
</body>
</html>
