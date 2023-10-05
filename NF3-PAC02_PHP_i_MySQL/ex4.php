<?php
// Conexión a la base de datos (de nuevo)
$db = mysqli_connect('localhost', 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Número de elementos por página
$itemsPorPagina = 10;

// Obtener la página actual desde la URL
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el punto de inicio para LIMIT
$inicio = ($paginaActual - 1) * $itemsPorPagina;

// Consulta SQL para obtener los elementos de la página actual
$query = "SELECT movie.movie_name AS movie_title, 
                 people.people_fullname AS director, 
                 lead_actor.people_fullname AS lead_actor
          FROM movie
          INNER JOIN people ON movie.movie_director = people.people_id
          INNER JOIN people AS lead_actor ON movie.movie_leadactor = lead_actor.people_id
          LIMIT $inicio, $itemsPorPagina";

$result = mysqli_query($db, $query);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("La consulta SQL falló: " . mysqli_error($db));
}

// Imprimir los resultados
echo "<table>";
echo "<tr><th>Título de la película</th><th>Director</th><th>Actor Principal</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['movie_title'] . "</td>";
    echo "<td>" . $row['director'] . "</td>";
    echo "<td>" . $row['lead_actor'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Obtener el número total de elementos
$totalElementos = mysqli_num_rows(mysqli_query($db, "SELECT * FROM movie"));

// Calcular el número total de páginas
$totalPaginas = ceil($totalElementos / $itemsPorPagina);

// Imprimir enlaces de navegación
echo "<div class='pagination'>";
for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<a href='ex1.php?pagina=$i'>pagina 1 </a> ";
echo "<a href='ex2.php?pagina=$i'>pagina 2 </a> ";
echo "<a href='ex3.php?pagina=$i'>pagina 3</a> ";
}
echo "</div>";

// Cerrar la conexión a la base de datos
mysqli_close($db);
?>
