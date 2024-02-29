<?php

class Language extends DataBoundObject {
        protected $ID;
        protected $Name;
        protected $LastUpdate;
       

        protected function DefineTableName() {
                return("language");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "name" => "Name",
                        "last_update" => "LastUpdate"));
        }
}


?>
