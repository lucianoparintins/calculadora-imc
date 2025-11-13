<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    if (is_numeric($peso) && is_numeric($altura)) {
        $imc = $peso / ($altura * $altura);
        $imc = number_format($imc, 2);

        $mensagem = "";
        if ($imc < 18.5) {
            $mensagem = "Abaixo do peso.";
        } elseif ($imc < 25) {
            $mensagem = "Peso normal.";
        } elseif ($imc < 30) {
            $mensagem = "Sobrepeso.";
        } else {
            $mensagem = "Obesidade.";
        }

        echo "Seu IMC é: " . $imc . " - " . $mensagem;
    } else {
        echo "Por favor, insira valores numéricos para peso e altura.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de IMC</title>
</head>
<body>
    <h1>Calculadora de IMC</h1>
    <form method="post">
        Peso (kg): <input type="text" name="peso"><br>
        Altura (m): <input type="text" name="altura"><br>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
