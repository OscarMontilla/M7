<?php
require('class.pdofactory.php');
require('abstract.databoundobject.php');
require('class.twitter.php');

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$objTwitter = new Twitter2($objPDO,5);

$url = $objTwitter->getUrl();
$author_name = $objTwitter->getAuthorName();
$provider_name = $objTwitter->getProviderName();
$photo = $objTwitter->getPhoto();


echo '<table border="1" style="border-collapse: collapse; width: 100%;">';
echo '<tr><th>Url del tweet</th><th>Nombre autor</th><th>Nombre proveedor</th><th>Foto</th></tr>';  
echo "<tr>";
echo "<td>{$url}</td>";
echo "<td>{$author_name}</td>";
echo "<td>{$provider_name}</td>";
echo "<td>{$photo}</td>";
echo "</tr>";
echo '</table>';

?>