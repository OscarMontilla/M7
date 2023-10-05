<?php
// Conexión a la base de datos
$db = mysqli_connect('localhost', 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Crear una relación entre movie_leadactor y people_id
$query = "ALTER TABLE movie ADD CONSTRAINT fk_movie_leadactor FOREIGN KEY (movie_leadactor) REFERENCES people(people_id)";
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Relationship successfully created!';
?>
