<?php


class Film extends DataBoundObject {
        protected $ID;
        protected $Title;
        protected $Description;
        protected $ReleaseYear;
        protected $LanguageID;

        protected $RentalDuration;
        protected $RentalRate;
        protected $Length;
        protected $ReplacementCost;
        protected $Rating;
        protected $LastUpdate;
        protected $SpecialFeatures;
        protected $FullText;

        protected function DefineTableName() {
                return("film");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "title" => "Title",
                        "description" => "Description",
                        "release_year" => "ReleaseYear",
                        "language_id" => "LanguageID",
                        "rental_duration" => "RentalDuration",
                        "rental_rate" => "RentalRate",
                        "length" => "Length",
                        "replacement_cost" => "ReplacementCost",
                        "rating" => "Rating",
                        "last_update" => "LastUpdate",
                        "special_features" => "SpecialFeatures"));
        }

       
}

?>
