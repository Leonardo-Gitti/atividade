<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Estação do Ano</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Calculadora de Estação do Ano</h1>
    <form method="post">
        <label for="data">Insira uma data (formato: AAAA-MM-DD):</label><br>
        <input type="date" id="data" name="data" required><br><br>
        <button type="submit">Calcular Estação</button>
    </form>

    <?php
    function obterEstacaoPorData($data) {
        $timestamp = strtotime($data);

        if (!$timestamp) {
            return "Data inválida! Certifique-se de usar o formato AAAA-MM-DD.";
        }

        $mes = date('n', $timestamp);
        $dia = date('j', $timestamp);

        if (($mes == 12 && $dia >= 21) || $mes == 1 || $mes == 2 || ($mes == 3 && $dia < 21)) {
            return 'Verão';
        } elseif (($mes == 3 && $dia >= 21) || $mes == 4 || $mes == 5 || ($mes == 6 && $dia < 21)) {
            return 'Outono';
        } elseif (($mes == 6 && $dia >= 21) || $mes == 7 || $mes == 8 || ($mes == 9 && $dia < 23)) {
            return 'Inverno';
        } else {
            return 'Primavera';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data'])) {
        $dataInserida = $_POST['data'];
        $estacao = obterEstacaoPorData($dataInserida);
        echo "<p>A estação correspondente à data <strong>$dataInserida</strong> no Brasil é: <strong>$estacao</strong>.</p>";
    }
    ?>
</body>
</html>
