<?php

class Comment {
      public $id;
      public $postID;
      public $userID;
      public $body;
      
      public function __construct($id = -1, $postID, $userID, $body){
            $this->id     = $id;
      	$this->postID = $postID;
      	$this->userID = $userID;
            $this->body   = $body;
      }
}
?>