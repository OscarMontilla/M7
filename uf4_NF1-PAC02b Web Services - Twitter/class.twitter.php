<?php

include_once("abstract.databoundobject.php");
include_once("class.pdofactory.php");

class Twitter2 extends DataBoundObject {

    protected $ID;
    protected $Url;
    protected $AuthorName;
    protected $ProviderName;
    protected $Photo;

    protected function DefineTableName() {
        return("twitter2");
    }

    protected function DefineRelationMap() {

        return(array(
            "id" => "ID",
            "url" => "Url",
            "author_name" => "AuthorName",
            "provider_name" => "ProviderName",
            "photo" => "Photo",
        ));
    }
  
    
}

?>
