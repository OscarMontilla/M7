<?php


$html = file_get_contents("https://osdr.nasa.gov/osdr/data/osd/files/87");

$json = json_decode($html);


$hits = $json->hits;
$input = $json->input;
$page_number = $json->page_number;
$page_size = $json->page_size;
$page_total = $json->page_total;


$host = 'localhost';
$port = 5432;
$dbname = 'usuaris';
$user = 'postgres';
$password = 'root';


$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
try {
   
    $conn = new PDO($dsn);
    if($conn) {
        $sql = "INSERT INTO science (hits, input, page_number, page_size, page_total) VALUES ({$hits}, '{$input}', {$page_number}, {$page_size}, {$page_total})";
        $conn->exec($sql); 
        echo "Se han insertado los valores correctamente";
    }
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>