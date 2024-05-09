<?php

include_once("abstract.databoundobject.php");
include_once("class.pdofactory.php");

class Twitter extends DataBoundObject {

    protected $ID;
    protected $Url;
    protected $AuthorName;
    protected $AuthorUrl;
    protected $ProviderName;

    protected function DefineTableName() {
        return("twitter1");
    }

    protected function DefineRelationMap() {

        return(array(
            "id" => "ID",
            "url" => "Url",
            "author_name" => "AuthorName",
            "author_url" => "AuthorUrl",
            "provider_name" => "ProviderName",
        ));
    }
  
    
}

?>
