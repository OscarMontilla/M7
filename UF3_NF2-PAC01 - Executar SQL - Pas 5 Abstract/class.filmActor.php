<?php

class filmActor extends DataBoundObject {
        protected $ID;
        protected $FilmID;
        protected $LastUpdate;
       

        protected function DefineTableName() {
                return("film_actor");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "film_id" => "FilmID",
                        "last_update" => "LastUpdate"));
        }
}

?>

