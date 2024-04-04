<?php

require("class.pdofactory.php");
print "Running...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";
$objPDO = new PDO($strDSN);
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {

	// begin the transaction

	$strQuery1 = "INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country) VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway')";
	$strQuery2 = "INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country) VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway')";

	$objPDO->beginTransaction();

	$objPDO->exec($strQuery1);
	$objPDO->exec($strQuery2);

	// commit the transaction
	$objPDO->commit();

} catch (Exception $e) {

	// rollback the transaction
	$objPDO->rollBack();
	echo "Failed: ".$e->getMessage();
}