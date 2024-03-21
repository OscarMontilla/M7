<?php
        require("class.pdofactory.php");
        require("abstract.databoundobject.php");
        require("class.userApp.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
            array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
       /* $objUserApp = new UserApp($objPDO);
        $objUserApp2 = new UserApp($objPDO);
        $objUserApp3 = new UserApp($objPDO);*/

        $objUserApp = new UserApp($objPDO,11);
        
       
       /* $objUserApp->setNom("Oscar");
        $objUserApp->setGroup("Grupo1");
        $objUserApp->setCreated(date("Y-m-d H:i:s"));
        $objUserApp->setLastUpdated(date("Y-m-d H:i:s"));
        $objUserApp->setIsActive(true);*/
        
        

    
      /* //update
        $objUserApp->setNom("Manolo");
        $objUserApp->setGroup("Grupo12");
        $objUserApp->setCreated(date("Y-m-d H:i:s"));
        $objUserApp->setLastUpdated(date("Y-m-d H:i:s"));
        $objUserApp->setIsActive(true);*/

        //Guardo en base de datos antes y despues del update
        //$objUserApp->Save();

        /*//Muestro por pantalla primero los valores y luego el update
        print "ID is " . $objUserApp->getID() . "<br />";
        print "Name is " . $objUserApp->getNom() . "<br />";
        print "group is " . $objUserApp->getGroup() . "<br />";
        print "created: " . $objUserApp->getCreated() . "<br />";
        print "lastUpdated: " . $objUserApp->getLastUpdated() . "<br />";
        print "IsActive de UserApp: " . ($objUserApp->getIsActive() ? 'true' : 'false') . "<br />";*/
      
        //Borro de la base de datos el language, para ello antes comentos todo el codigo menos el objLanguage con su id que se quiere borrar
         print "Deleting...";

         $objUserApp->MarkForDeletion();
         unset($objUserApp);

/*
         //$objUserApp2 = new UserApp($objPDO,2);

         $objUserApp2->setNom("Oscar2");
        $objUserApp2->setGroup("Grupo2");
        $objUserApp2->setCreated(date("Y-m-d H:i:s"));
        $objUserApp2->setLastUpdated(date("Y-m-d H:i:s"));
        $objUserApp2->setIsActive(true);
        //Guardo en base de datos
        $objUserApp2->Save();

        print "ID is " . $objUserApp2->getID() . "<br />";
        print "Name is " . $objUserApp2->getNom() . "<br />";
        print "group is " . $objUserApp2->getGroup() . "<br />";
        print "created: " . $objUserApp2->getCreated() . "<br />";
        print "lastUpdated: " . $objUserApp2->getLastUpdated() . "<br />";
        print "IsActive de UserApp: " . ($objUserApp2->getIsActive() ? 'true' : 'false') . "<br />";

         //$objUserApp3 = new UserApp($objPDO,3);

         $objUserApp3->setNom("Oscar3");
         $objUserApp3->setGroup("Grupo3");
         $objUserApp3->setCreated(date("Y-m-d H:i:s"));
         $objUserApp3->setLastUpdated(date("Y-m-d H:i:s"));
         $objUserApp3->setIsActive(true);
         //Guardo en base de datos
         $objUserApp3->Save();
 
         print "ID is " . $objUserApp3->getID() . "<br />";
         print "Name is " . $objUserApp3->getNom() . "<br />";
         print "group is " . $objUserApp3->getGroup() . "<br />";
         print "created: " . $objUserApp3->getCreated() . "<br />";
         print "lastUpdated: " . $objUserApp3->getLastUpdated() . "<br />";
         print "IsActive de UserApp: " . ($objUserApp3->getIsActive() ? 'true' : 'false') . "<br />";*/
         