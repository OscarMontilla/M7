<?php

require("class.pdofactory.php");
print "Running...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";
$objPDO = new PDO($strDSN);
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {

	// begin the transaction

	$strQuery1 = "INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country) VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway')";
	$strQuery2 = "INSERT INT Customers (CustomerName, ContactName, Address, City, PostalCode, Country) VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway')";

	$objPDO->beginTransaction();

	$objPDO->exec($strQuery1);
	$objPDO->exec($strQuery2);

	// commit the transaction
	$objPDO->commit();

} catch (Exception $e) {

	// rollback the transaction
	$objPDO->rollBack();
	echo "Failed: ".$e->getMessage();

     // Guardar el mensaje de error en una tabla
     $errorMessage = $e->getMessage();
     $strErrorQuery = "INSERT INTO customers (error_message) VALUES (:errorMessage)";
     $stmt = $objPDO->prepare($strErrorQuery);
     $stmt->bindParam(':errorMessage', $errorMessage);
     $stmt->execute();
 
     // Guardar el mensaje de error en un archivo
     $errorLogFile = 'error_log.txt';
     $errorLogContent = date('Y-m-d H:i:s') . ': ' . $errorMessage . "\n";
     file_put_contents($errorLogFile, $errorLogContent, FILE_APPEND);
}