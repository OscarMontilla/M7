<?php 


include_once("abstract.databoundobject.php");

class LoginDetails extends DataBoundObject {

        protected $LoginDetailsId;
        protected $UserId;
        protected $LastActivity;
        protected $IsType;
	



        protected function DefineTableName() {
                return("login_details");
        }

        protected function DefineRelationMap() {
                return(array(
                        "login_details_id" => "LoginDetailsId",
                        "user_id" => "UserId",
                        "last_activity" => "LastActivity",
			"is_type" => "IsType"));
        }
}

?>