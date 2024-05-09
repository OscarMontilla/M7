<?php 


include_once("abstract.databoundobject.php");

class ChatMessage extends DataBoundObject {

        protected $ChatMessageId;
        protected $ToUserId;
        protected $FromUserId;
        protected $ChatMessage;
	protected $Timestamp;
        protected $Status;



        protected function DefineTableName() {
                return("chat_message");
        }

        protected function DefineRelationMap() {
                return(array(
                        "chat_message_id" => "ChatMessageId",
                        "to_user_id" => "ToUserId",
                        "from_user_id" => "FromUserId",
                        "chat_message" => "ChatMessage",
                        "timestamp" => "Timestamp",
			"status" => "Status"));
        }
}

?>