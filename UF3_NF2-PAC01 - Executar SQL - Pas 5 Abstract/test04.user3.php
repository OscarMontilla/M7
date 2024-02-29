<?php
        require("class.pdofactory.php");
        require("abstract.databoundobject.php");
        require("class.language.php");
        require("class.film.php");
        require("class.filmActor.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
            array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              
        
         //Creo el objeto sin el id1, el id1 lo pongo despues de crearlo para hacer el update
           $objLanguage = new Language($objPDO,1);
           $objLanguage->setName("Oscar");
           $objLanguage->setLastUpdate(date("Y-m-d H:i:s"));
           $objLanguage->Save();
 
         //Hago un update de language en base de datos, para ello comentos los set que he hecho antes para que no haya problemas
          $objLanguage->setName("Angel");
          $objLanguage->setLastUpdate(date("Y-m-d H:i:s"));;
          $objLanguage->Save();

         //Saco por pantalla primero los set para darle valor a los campos y luego lo uso para sacar la informacion actualizada comentado los primeros set
          print "Language ID is " . $objLanguage->getID() . "<br />";
          print "Name is " . $objLanguage->getName() . "<br />";
          print "Last Update is " . $objLanguage->getLastUpdate() . "<br />";
 
 
         //Borro de la base de datos el language, para ello antes comentos todo el codigo menos el objLanguage con su id que se quiere borrar
          print "Deleting...";

         $objLanguage->MarkForDeletion();
         unset($objLanguage);
       

         //Creo el objeto sin el id1, el id1 lo pongo despues de crearlo para hacer el update
         $objFilm = new Film($objPDO,1);
           $objFilm->setTitle("Dune"); 
           $objFilm->setDescription("Se trata de un joven brillante y de gran talento con un destino grandioso que no comprende todavía y que deberá viajar al planeta más peligroso del universo para asegurar el futuro de su familia y de su pueblo."); 
           $objFilm->setReleaseYear(2012);
           $objFilm->setLanguageID(4); 
           $objFilm->setRentalDuration(4);
           $objFilm->setRentalRate(2.99);
           $objFilm->setLength(130); 
           $objFilm->setReplacementCost(18.00);
           $objFilm->setRating("PG-10");
           $objFilm->setLastUpdate(date("Y-m-d H:i:s"));
           $objFilm->setSpecialFeatures("Ejemplo");
           $objFilm->Save();

        //Hago un update modificando todos los datos y comento los set de arriba
         $objFilm->setTitle("Prisoners"); 
         $objFilm->setDescription("Unos prisioneros intentar salir de la carcel"); 
         $objFilm->setReleaseYear(2017);
         $objFilm->setLanguageID(1); 
         $objFilm->setRentalDuration(2);
         $objFilm->setRentalRate(3.99);
         $objFilm->setLength(135); 
         $objFilm->setReplacementCost(30.00);
         $objFilm->setRating("PG-19");
         $objFilm->setLastUpdate(date("Y-m-d H:i:s"));
         $objFilm->setSpecialFeatures("Ejemplo2");
         $objFilm->Save();

        //Saco por pantalla la informacion actualizada y sin actualizar
          print "Film ID is " . $objFilm->getID() . "<br />";
          print "Title is " . $objFilm->getTitle() . "<br />";
          print "Description is " . $objFilm->getDescription() . "<br />";
          print "Release Year is " . $objFilm->getReleaseYear() . "<br />";
          print "Language ID is " . $objFilm->getLanguageID() . "<br />";
          print "Rental Duration is " . $objFilm->getRentalDuration() . "<br />";
          print "Rental Rate is " . $objFilm->getRentalRate() . "<br />";
          print "Length is " . $objFilm->getLength() . "<br />";
          print "Replacement Cost is " . $objFilm->getReplacementCost() . "<br />";
          print "Rating is " . $objFilm->getRating() . "<br />";
          print "Last Update is " . $objFilm->getLastUpdate() . "<br />";
          print "Special Features are " . $objFilm->getSpecialFeatures() . "<br />";
          print "Fulltext is " . $objFilm->getFulltext() . "<br />";

        // //Borro la pelicula de la base de datos
         print "Deleting...";

         $objFilm->MarkForDeletion();
	     unset($objFilm);

        //Creo el objeto sin el id1, el id1 lo pongo despues de crearlo para hacer el update
         $objFilmActor = new FilmActor($objPDO,1);
           $objFilmActor->setFilmID(3);
           $objFilmActor->Save();

         //Hago un update de filmActor en base de datos
        $objFilmActor->setFilmID(5);
        $objFilmActor->Save();

         //Saco por pantalla la informacion del principio y actualizada
         print "FilmActor ID is " . $objFilmActor->getID() . "<br />";
         print "Film ID is " . $objFilmActor->getFilmID() . "<br />";
         print "Last Update is " . $objFilmActor->getLastUpdate() . "<br />";


        // Borro de la base de datos el filmActor
         print "Deleting...";

         $objFilmActor->MarkForDeletion();
	     unset($objFilmActor);

        

?>