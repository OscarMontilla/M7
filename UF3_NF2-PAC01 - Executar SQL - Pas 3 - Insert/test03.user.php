<?php

        require("class.user.insert.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $objUser = new User($objPDO, 1);

        print "ID: " . $objUser->getID() . "<br />";
        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";
        print "Password is " . $objUser->getPassword() . "<br />";
        print "Username is " . $objUser->getUsername() . "<br/>";
        print "Email Address is " . $objUser->getEmailAddress() . "<br/>";
        print "Date Last Login is " . $objUser->getDateLastLogin() . "<br/>";
        print "Time Last Login is " . $objUser->getTimeLastLogin() . "<br/>";
        print "Date Account Login is " . $objUser->getDateAccountCreated() . "<br/>";
        print "Time Account Login is " . $objUser->getTimeAccountCreated() . "<br/><br/>";
       
        $objUser2 = new User($objPDO, 3);

        print "ID: " . $objUser2->getID() . "<br />";
        print "First name is " . $objUser2->getFirstName() . "<br />";
        print "Last name is " . $objUser2->getLastName() . "<br />";
        print "Password is " . $objUser2->getPassword() . "<br />";
        print "Username is " . $objUser2->getUsername() . "<br/>";
        print "Email Address is " . $objUser2->getEmailAddress() . "<br/>";
        print "Date Last Login is " . $objUser2->getDateLastLogin() . "<br/>";
        print "Time Last Login is " . $objUser2->getTimeLastLogin() . "<br/>";
        print "Date Account Login is " . $objUser2->getDateAccountCreated() . "<br/>";
        print "Time Account Login is " . $objUser2->getTimeAccountCreated() . "<br/><br/>";
      


// Intercambio de valores
$tempFirstName = $objUser->getFirstName();
$tempLastName = $objUser->getLastName();
$tempPassword = $objUser->getPassword();
$tempUsername = $objUser->getUsername();
$tempEmailAddress = $objUser->getEmailAddress();
$tempDateLastLogin = $objUser->getDateLastLogin();
$tempTimeLastLogin = $objUser->getTimeLastLogin();
$tempDateAccountCreated = $objUser->getDateAccountCreated();
$tempTimeAccountCreated = $objUser->getTimeAccountCreated();


$objUser-> setFirstName($objUser2->getFirstName());
$objUser-> setLastName($objUser2->getLastName());
$objUser-> setPassword($objUser2->getPassword());
$objUser-> setUsername($objUser2->getUsername());
$objUser-> setEmailAddress($objUser2->getEmailAddress());
$objUser-> setDateLastLogin($objUser2->getDateLastLogin());
$objUser-> setTimeLastLogin($objUser2->getTimeLastLogin());
$objUser-> setDateAccountCreated($objUser2->getDateAccountCreated());
$objUser-> setTimeAccountCreated($objUser2->getTimeAccountCreated());

$objUser2-> setFirstName($tempFirstName);
$objUser2-> setLastName($tempLastName);
$objUser2-> setPassword($tempPassword);
$objUser2-> setUsername($tempUsername);
$objUser2-> setEmailAddress($tempEmailAddress);
$objUser2-> setDateLastLogin($tempDateLastLogin);
$objUser2-> setTimeLastLogin($tempTimeLastLogin);
$objUser2-> setDateAccountCreated($tempDateAccountCreated);
$objUser2-> setDateAccountCreated($tempDateAccountCreated);

$objUser->Save();
$objUser2->Save();

//mostrar despues del intercambio
print "despues del intercambio: <br />";
print "Primer usuario: <br />";
print "ID: " . $objUser->getID() . "<br />";
print "First name is " . $objUser->getFirstName() . "<br />";
print "Last name is " . $objUser->getLastName() . "<br />";
print "Password is " . $objUser->getUsername() . "<br />";
print "Username is " . $objUser->getPassword() . "<br />";
print "Email is " . $objUser->getEmailAddress() . "<br />";
print "Date last login is " . $objUser->getDateLastLogin() . "<br />";
print "Time last login is " . $objUser->getTimeLastLogin() . "<br />";
print "Date account created is " . $objUser->getDateAccountCreated() . "<br />";
print "Time account created is " . $objUser->getTimeAccountCreated() . "<br/><br/>";

print "Segundo usuario: <br />";
print "ID: " . $objUser2->getID() . "<br />";
print "First name is " . $objUser2->getFirstName() . "<br />";
print "Last name is " . $objUser2->getLastName() . "<br />";
print "Password is " . $objUser2->getUsername() . "<br />";
print "Username is " . $objUser2->getPassword() . "<br />";
print "Email is " . $objUser2->getEmailAddress() . "<br />";
print "Date last login is " . $objUser2->getDateLastLogin() . "<br />";
print "Time last login is " . $objUser2->getTimeLastLogin() . "<br />";
print "Date account created is " . $objUser2->getDateAccountCreated() . "<br />";
print "Time account created is " . $objUser2->getTimeAccountCreated() . "<br/><br/>";



?>