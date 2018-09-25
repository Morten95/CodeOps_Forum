<?php

class Post {
      public $id;
      public $body;
      public $userId;
      public $topicId;

      
      public function __construct($id=-1, $body, $userId, $topicId){
      	$this->id = $id;
      	$this->body = $body;
      	$this->userId = $userId;
      	$this->topicId = $topicId;
      }

     
}