<?php

        require("class.user2.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         creo Primer usuario
         $objUser2 = new User($objPDO);

         $objUser2->setFirstName("Delete1");
         $objUser2->setLastName("Delete1");
         $objUser2->setPassword("pDelete1");
        $objUser2->setUsername("Delete1");
         $objUser2->setEmailAddress("delete1@gmail.com");
         $objUser2->setDateLastLogin('2023-08-20');
        $objUser2->setTimeLastLogin('21:15:00');
        $objUser2->setDateAccountCreated('2023-08-20');
        $objUser2->setTimeAccountCreated('21:15:00');

        //creo Segundo usuario
         $objUser3 = new User($objPDO);

         $objUser3->setFirstName("Delete2");
        $objUser3->setLastName("Delete2");
        $objUser3->setPassword("pDelete2");
       $objUser3->setUsername("Delete2");
       $objUser3->setEmailAddress("delete2@gmail.com");
       $objUser3->setDateLastLogin('2023-05-28');
        $objUser3->setTimeLastLogin('20:18:00');
       $objUser3->setDateAccountCreated('2023-05-28');
        $objUser3->setTimeAccountCreated('20:18:00');

        //creo Tercer usuario
       $objUser4 = new User($objPDO);
         $objUser4->setLastName("Delete3");
        $objUser4->setPassword("pDelete3");
        $objUser4->setUsername("Delete3");
       $objUser4->setEmailAddress("delete3@gmail.com");
       $objUser4->setDateLastLogin('2023-02-28');
      $objUser4->setTimeLastLogin('22:00:00');
         $objUser4->setDateAccountCreated('2023-02-28');
         $objUser4->setTimeAccountCreated('22:00:00');

         $objUser2->Save();
         $objUser3->Save();
        $objUser4->Save();


          //datos primer usuario
          print("Usuario 1");
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


          //Muestro datos segundo usuario
         print("Usuario 2");
         print "ID: " . $objUser3->getID() . "<br />";
         print "First name is " . $objUser3->getFirstName() . "<br />";
          print "Last name is " . $objUser3->getLastName() . "<br />";
          print "Password is " . $objUser3->getPassword() . "<br />";
         print "Username is " . $objUser3->getUsername() . "<br/>";
          print "Email Address is " . $objUser3->getEmailAddress() . "<br/>";
          print "Date Last Login is " . $objUser3->getDateLastLogin() . "<br/>";
          print "Time Last Login is " . $objUser3->getTimeLastLogin() . "<br/>";
          print "Date Account Login is " . $objUser3->getDateAccountCreated() . "<br/>";
          print "Time Account Login is " . $objUser3->getTimeAccountCreated() . "<br/><br/>";
 
        

         //Muestro datos tercer usuario
        print("Usuario 3");
        print "ID: " . $objUser4->getID() . "<br />";
        print "First name is " . $objUser4->getFirstName() . "<br />";
         print "Last name is " . $objUser4->getLastName() . "<br />";
         print "Password is " . $objUser4->getPassword() . "<br />";
         print "Username is " . $objUser4->getUsername() . "<br/>";
        print "Email Address is " . $objUser4->getEmailAddress() . "<br/>";
        print "Date Last Login is " . $objUser4->getDateLastLogin() . "<br/>";
        print "Time Last Login is " . $objUser4->getTimeLastLogin() . "<br/>";
        print "Date Account Login is " . $objUser4->getDateAccountCreated() . "<br/>";
        print "Time Account Login is " . $objUser4->getTimeAccountCreated() . "<br/><br/>";



        print "<hr>";

        print "modificado";
        print "<hr>";

        
         $objUser2 = new User($objPDO,32);
         $objUser2->setFirstName('Delete1Copia');
        $objUser2->setLastName('Delete1Copia');
       $objUser2->setUsername('Delete1Copia');
         $objUser2->setPassword('Pdelete1Copia');
         $objUser2->setEmailAddress('delete1copia@gmail.com');
         $objUser2->setDateAccountCreated('2020-04-04');
         $objUser2->setTimeAccountCreated('18:05:08');
         $objUser2->setDateLastLogin('2020-04-04');
        $objUser2->setTimeLastLogin('18:05:08');



         $objUser3 = new User($objPDO,33);
         $objUser3->setFirstName('Delete2Copia');
         $objUser3->setLastName('Delete2Copia');
         $objUser3->setUsername('Delete2Copia');
        $objUser3->setPassword('Pdelete2Copia');
        $objUser3->setEmailAddress('delete2copia@gmail.com');
         $objUser3->setDateAccountCreated('2021-07-04');
         $objUser3->setTimeAccountCreated('14:01:02');
         $objUser3->setDateLastLogin('2021-07-04');
         $objUser3->setTimeLastLogin('14:01:02');


         $objUser4 = new User($objPDO,34);
        $objUser4->setFirstName('Delete3Copia');
         $objUser4->setLastName('Delete3Copia');
         $objUser4->setUsername('Delete3Copia');
         $objUser4->setPassword('Pdelete3Copia');
         $objUser4->setEmailAddress('delete3copia@gmail.com');
         $objUser4->setDateAccountCreated('2025-08-04');
         $objUser4->setTimeAccountCreated('23:03:09');
         $objUser4->setDateLastLogin('2025-08-04');
         $objUser4->setTimeLastLogin('23:03:09');
       
       
       
         $objUser2->Save();
         $objUser3->Save();
         $objUser4->Save();

         print "Usuario 1";
         print "<hr>";

         print "ID: " . $objUser2->getID() . "<br />";
         print "First name is " . $objUser2->getFirstName() . "<br />";
         print "Last name is " . $objUser2->getLastName() . "<br />";
         print "Password is " . $objUser2->getPassword() . "<br />";
         print "Mail is " . $objUser2->getEmailAddress() . "<br />";
         print "DateLastLogin " . $objUser2->getDateLastLogin() . "<br />";
         print "TimeLastLogin " . $objUser2->getTimeLastLogin() . "<br />";
         print "DateAccountCreated " . $objUser2->getDateAccountCreated() . "<br />";
         print "TimeAccountCreated " . $objUser2->getTimeAccountCreated() . "<br />";




        print "usuario 2";
         print "<hr>";

         print "ID: " . $objUser3->getID() . "<br />";
         print "First name is " . $objUser3->getFirstName() . "<br />";
         print "Last name is " . $objUser3->getLastName() . "<br />";
         print "Password is " . $objUser3->getPassword() . "<br />";
         print "Mail is " . $objUser3->getEmailAddress() . "<br />";
         print "DateLastLogin " . $objUser3->getDateLastLogin() . "<br />";
         print "TimeLastLogin " . $objUser3->getTimeLastLogin() . "<br />";
         print "DateAccountCreated " . $objUser3->getDateAccountCreated() . "<br />";
         print "TimeAccountCreated " . $objUser3->getTimeAccountCreated() . "<br />";



         print "usuario 3";
         print "<hr>";

         print "ID: " . $objUser4->getID() . "<br />";
         print "First name is " . $objUser4->getFirstName() . "<br />";
         print "Last name is " . $objUser4->getLastName() . "<br />";
         print "Password is " . $objUser4->getPassword() . "<br />";
         print "Mail is " . $objUser4->getEmailAddress() . "<br />";
         print "DateLastLogin " . $objUser4->getDateLastLogin() . "<br />";
         print "TimeLastLogin " . $objUser4->getTimeLastLogin() . "<br />";
         print "DateAccountCreated " . $objUser4->getDateAccountCreated() . "<br />";
         print "TimeAccountCreated " . $objUser4->getTimeAccountCreated() . "<br />";




         $objUser2->MarkForDeletion();
	 unset($objUser2);

        $objUser3->MarkForDeletion();
	 unset($objUser3);

        $objUser4->MarkForDeletion();
	 unset($objUser4);

      
   




        

	