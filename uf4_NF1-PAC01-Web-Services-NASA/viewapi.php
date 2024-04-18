<?php

$html = file_get_contents("https://osdr.nasa.gov/osdr/data/osd/files/87");

$json = json_decode($html);


$hits = $json->hits;
$input = $json->input;
$page_number = $json->page_number;
$page_size = $json->page_size;
$page_total = $json->page_total;


echo '<table border="1" style="border-collapse: collapse; width: 100%;">';
echo '<tr><th>hits</th><th>input</th><th>page_number</th><th>page_size</th><th>page_total</th></tr>';  
echo "<tr>";
echo "<td>{$hits}</td>";
echo "<td>{$input}</td>";
echo "<td>{$page_number}</td>";
echo "<td>{$page_size}</td>";
echo "<td>{$page_total}</td>";
echo "</tr>";
echo '</table>';

?>