<?php
require_once 'CalcularIMCService.php';

$imcFormatado = null;
$mensagem = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    if (is_numeric($peso) && is_numeric($altura)) {
        $imc = CalcularIMCService::calcular((float)$peso, (float)$altura);

        if ($imc !== null) {
            $imcFormatado = number_format($imc, 2);

            if ($imc < 18.5) {
                $mensagem = "Abaixo do peso.";
            } elseif ($imc < 25) {
                $mensagem = "Peso normal.";
            } elseif ($imc < 30) {
                $mensagem = "Sobrepeso.";
            } else {
                $mensagem = "Obesidade.";
            }
        } else {
            $mensagem = "Peso e altura devem ser valores positivos.";
        }
    } else {
        $mensagem = "Por favor, insira valores numéricos para peso e altura.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de IMC</title>
    <style>
        body { font-family: sans-serif; margin: 2em; }
        .resultado { margin-top: 1em; padding: 1em; border: 1px solid #ccc; background-color: #f9f9f9; }
        .error { color: #d8000c; background-color: #ffbaba; }
    </style>
</head>
<body>
    <h1>Calculadora de IMC</h1>
    <form method="post">
        Peso (kg): <input type="text" name="peso"><br>
        Altura (m): <input type="text" name="altura"><br>
        <input type="submit" value="Calcular">
    </form>

    <?php if ($mensagem): ?>
        <div class="resultado <?php echo $imcFormatado === null ? 'error' : ''; ?>">
            <?php echo $imcFormatado ? "Seu IMC é: <strong>$imcFormatado</strong> - " : ''; ?>
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>
</body>
</html>
