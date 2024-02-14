<?php

require("Customer.php");

$objCustomer1 = new Customer();
$objCustomer1->setCustCode("001");
$objCustomer1->setCustName("Paco");
$objCustomer1->setCustCity("Zaragoza");
$objCustomer1->setGrade("A");
$objCustomer1->setOpeningAmt(1000);
$objCustomer1->setReceiveAmt(500);
$objCustomer1->setPaymentAmt(200);
$objCustomer1->setOutstandingAmt(300);
$objCustomer1->setPhoneNo("674563456");
$objCustomer1->setAgentCode("AGT001");

$objCustomer2 = new Customer();
$objCustomer2->setCustCode("002");
$objCustomer2->setCustName("Manuel");
$objCustomer2->setCustCity("Madrid");
$objCustomer2->setGrade("B");
$objCustomer2->setOpeningAmt(2000);
$objCustomer2->setReceiveAmt(700);
$objCustomer2->setPaymentAmt(300);
$objCustomer2->setOutstandingAmt(400);
$objCustomer2->setPhoneNo("984734584");
$objCustomer2->setAgentCode("AGT002");

echo "Datos del primer cliente:<br/>";
echo "Código: " . $objCustomer1->getCustCode() . "<br/>";
echo "Nombre: " . $objCustomer1->getCustName() . "<br/>";
echo "Ciudad: " . $objCustomer1->getCustCity() . "<br/>";
echo "Grado: " . $objCustomer1->getGrade() . "<br/>";
echo "Monto de Apertura: " . $objCustomer1->getOpeningAmt() . "<br/>";
echo "Monto Recibido: " . $objCustomer1->getReceiveAmt() . "<br/>";
echo "Monto Pagado: " . $objCustomer1->getPaymentAmt() . "<br/>";
echo "Monto Pendiente: " . $objCustomer1->getOutstandingAmt() . "<br/>";
echo "Número de Teléfono: " . $objCustomer1->getPhoneNo() . "<br/>";
echo "Código de Agente: " . $objCustomer1->getAgentCode() . "<br/><br/>";

echo "Datos del segundo cliente:<br/>";
echo "Código: " . $objCustomer2->getCustCode() . "<br/>";
echo "Nombre: " . $objCustomer2->getCustName() . "<br/>";
echo "Ciudad: " . $objCustomer2->getCustCity() . "<br/>";
echo "Grado: " . $objCustomer2->getGrade() . "<br/>";
echo "Monto de Apertura: " . $objCustomer2->getOpeningAmt() . "<br/>";
echo "Monto Recibido: " . $objCustomer2->getReceiveAmt() . "<br/>";
echo "Monto Pagado: " . $objCustomer2->getPaymentAmt() . "<br/>";
echo "Monto Pendiente: " . $objCustomer2->getOutstandingAmt() . "<br/>";
echo "Número de Teléfono: " . $objCustomer2->getPhoneNo() . "<br/>";
echo "Código de Agente: " . $objCustomer2->getAgentCode() . "<br/><br/>";

// Intercambio de valores
$tempCustCode = $objCustomer1->getCustCode();
$tempCustName = $objCustomer1->getCustName();
$tempCustCity = $objCustomer1->getCustCity();
$tempGrade = $objCustomer1->getGrade();
$tempOpeningAmt = $objCustomer1->getOpeningAmt();
$tempReceiveAmt = $objCustomer1->getReceiveAmt();
$tempPaymentAmt = $objCustomer1->getPaymentAmt();
$tempOutstandingAmt = $objCustomer1->getOutstandingAmt();
$tempPhoneNo = $objCustomer1->getPhoneNo();
$tempAgentCode = $objCustomer1->getAgentCode();

$objCustomer1->setCustCode($objCustomer2->getCustCode());
$objCustomer1->setCustName($objCustomer2->getCustName());
$objCustomer1->setCustCity($objCustomer2->getCustCity());
$objCustomer1->setGrade($objCustomer2->getGrade());
$objCustomer1->setOpeningAmt($objCustomer2->getOpeningAmt());
$objCustomer1->setReceiveAmt($objCustomer2->getReceiveAmt());
$objCustomer1->setPaymentAmt($objCustomer2->getPaymentAmt());
$objCustomer1->setOutstandingAmt($objCustomer2->getOutstandingAmt());
$objCustomer1->setPhoneNo($objCustomer2->getPhoneNo());
$objCustomer1->setAgentCode($objCustomer2->getAgentCode());

$objCustomer2->setCustCode($tempCustCode);
$objCustomer2->setCustName($tempCustName);
$objCustomer2->setCustCity($tempCustCity);
$objCustomer2->setGrade($tempGrade);
$objCustomer2->setOpeningAmt($tempOpeningAmt);
$objCustomer2->setReceiveAmt($tempReceiveAmt);
$objCustomer2->setPaymentAmt($tempPaymentAmt);
$objCustomer2->setOutstandingAmt($tempOutstandingAmt);
$objCustomer2->setPhoneNo($tempPhoneNo);
$objCustomer2->setAgentCode($tempAgentCode);

echo "Después del intercambio:<br/>";
echo "Datos del primer cliente:<br/>";
echo "Código: " . $objCustomer1->getCustCode() . "<br/>";
echo "Nombre: " . $objCustomer1->getCustName() . "<br/>";
echo "Ciudad: " . $objCustomer1->getCustCity() . "<br/>";
echo "Grado: " . $objCustomer1->getGrade() . "<br/>";
echo "Monto de Apertura: " . $objCustomer1->getOpeningAmt() . "<br/>";
echo "Monto Recibido: " . $objCustomer1->getReceiveAmt() . "<br/>";
echo "Monto Pagado: " . $objCustomer1->getPaymentAmt() . "<br/>";
echo "Monto Pendiente: " . $objCustomer1->getOutstandingAmt() . "<br/>";
echo "Número de Teléfono: " . $objCustomer1->getPhoneNo() . "<br/>";
echo "Código de Agente: " . $objCustomer1->getAgentCode() . "<br/><br/>";

echo "Datos del segundo cliente después del intercambio:<br/>";
echo "Código: " . $objCustomer2->getCustCode() . "<br/>";
echo "Nombre: " . $objCustomer2->getCustName() . "<br/>";
echo "Ciudad: " . $objCustomer2->getCustCity() . "<br/>";
echo "Grado: " . $objCustomer2->getGrade() . "<br/>";
echo "Monto de Apertura: " . $objCustomer2->getOpeningAmt() . "<br/>";
echo "Monto Recibido: " . $objCustomer2->getReceiveAmt() . "<br/>";
echo "Monto Pagado: " . $objCustomer2->getPaymentAmt() . "<br/>";
echo "Monto Pendiente: " . $objCustomer2->getOutstandingAmt() . "<br/>";
echo "Número de Teléfono: " . $objCustomer2->getPhoneNo() . "<br/>";
echo "Código de Agente: " . $objCustomer2->getAgentCode() . "<br/><br/>";

?>
