<?php 


include_once("abstract.databoundobject.php");

class Login extends DataBoundObject {

        protected $UserId;
        protected $Username;
        protected $Password;
     



        protected function DefineTableName() {
                return("login");
        }

        protected function DefineRelationMap() {
                return(array(
                        "user_id" => "UserId",
                        "username" => "Username",
			"password" => "Password"));
        }
}

?>