<?php
// Conexión a la base de datos (de nuevo)
$db = mysqli_connect('localhost', 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Consulta SQL para obtener el nombre de la película, el director y el actor principal
$query = "SELECT movie.movie_name AS movie_title, 
                 people.people_fullname AS director, 
                 lead_actor.people_fullname AS lead_actor
          FROM movie
          INNER JOIN people ON movie.movie_director = people.people_id
          INNER JOIN people AS lead_actor ON movie.movie_leadactor = lead_actor.people_id";

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

// Cerrar la conexión a la base de datos
mysqli_close($db);
?>
