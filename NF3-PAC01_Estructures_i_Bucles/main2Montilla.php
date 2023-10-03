<?php
session_start(); // Iniciar o reanudar la sesión

if (isset($_SESSION['page_views'])) {
    $_SESSION['page_views']++;
} else {
    $_SESSION['page_views'] = 1;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
</head>
<body>
    
    <p>Esta página ha sido visitada <?php echo $_SESSION['page_views']; ?> veces.</p>

    <?php
    // Obtener la fecha actual
$fecha_actual = time();

// Calcular la fecha de hace dos días
$dos_dias_atras = strtotime('-2 days', $fecha_actual);

// Calcular la fecha del próximo mes
$proximo_mes = strtotime('first day of next month', $fecha_actual);

// Calcular los días restantes en el próximo mes
$dias_restantes = date('t', $proximo_mes) - date('j', $proximo_mes);

// Calcular los meses restantes en el año actual
$meses_restantes = 12 - date('n', $fecha_actual);

// Imprimir las frases completadas
echo "Hace dos días fue: " . date('d/m/Y', $dos_dias_atras) . ".\n";
echo "<br/>";
echo "El próximo mes es: " . date('F', $proximo_mes) . ".\n";
echo "<br/>";
echo "Quedan " . $dias_restantes . " días en el próximo mes.\n";
echo "<br/>";
echo "Quedan " . $meses_restantes . " meses en el año actual.\n";
$mes_actual = date("n"); // Obtener el mes actual (n representa el número del mes)


$mes_actual = date("n"); // Obtener el mes actual (n representa el número del mes)

if ($mes_actual >= 6 && $mes_actual <= 8) {
    echo "¡Buen verano!";
} elseif ($mes_actual >= 9 && $mes_actual <= 11) {
    echo "¡Buen otoño!";
} elseif ($mes_actual == 12 || $mes_actual <= 2) {
    echo "¡Buen invierno!";
} else {
    echo "¡Buen día!";
}
    ?>

    <form action="sec2montilla.php" method="post">
        <label for="color">Color del texto:</label>
        <input type="color" id="color" name="color"><br>

        <label for="fuente">Fuente de texto:</label>
        <select id="fuente" name="fuente">
            <option value="Arial">Arial</option>
            <option value="Times New Roman">Times New Roman</option>
        </select><br>

        <label for="tamaño">Tamaño del texto:</label>
        <input type="number" id="tamaño" name="tamaño" min="8" max="72" step="1"><br>

        <label for="texto">Texto:</label><br>
        <textarea id="texto" name="texto" rows="4" cols="50"></textarea><br>

        <label for="savePrefs">¿Guardar preferencias para la próxima vez?</label>
        <input type="checkbox" id="savePrefs" name="savePrefs" value="yes"><br>

        <input type="submit" name="guardar" value="Formatear Texto">
    </form>

    <footer style="text-align: center;">
        Site developed by: Oscar Montilla
        <a href="git">Oscar Montilla</a>
    </footer>
</body>
</html>
