<?php
session_start(); // Iniciar o reanudar la sesión

// Inicializar las variables
$color = "";
$fuente = "Arial";
$tamaño = "12px";
$texto = "";

// Verificar si el formulario se ha enviado
if (isset($_POST['guardar'])) {
    $color = $_POST['color'];
    $fuente = $_POST['fuente'];

    // Verificar si el campo de texto está definido en el formulario
    if (isset($_POST['texto'])) {
        $texto = $_POST['texto']; // Capturar el contenido del campo de texto
    }

    // Verificar si el tamaño del texto está definido en el formulario
    if (isset($_POST['tamaño'])) {
        $tamaño = $_POST['tamaño'] . 'px'; // Capturar el tamaño del texto y agregar 'px'
    }
}

// Guardar las preferencias en una cookie si se seleccionó la opción
if (isset($_POST['savePrefs']) && $_POST['savePrefs'] === "yes") {
    $cookie_name = "userPreferences";
    $cookie_value = json_encode([
        'color' => $color,
        'fuente' => $fuente,
        'tamaño' => $tamaño,
        'texto' => $texto
    ]);
    setcookie($cookie_name, $cookie_value, time() + (30 * 24 * 60 * 60), "/");
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Aplicar estilos basados en las preferencias del usuario */
        body {
            color: <?php echo $color; ?>;
            font-family: <?php echo $fuente; ?>;
            font-size: <?php echo $tamaño; ?>;
        }
    </style>
</head>
<body>
    <p><?php echo $texto; ?></p> <!-- Mostrar el texto formateado -->
    
    <footer style="text-align: center;">
        Site developed by: Oscar Montilla
        <a href="ENLACE_A_TU_GITHUB">Oscar Montilla</a>
    </footer>
</body>
</html>
