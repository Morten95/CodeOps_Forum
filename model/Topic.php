<?php

class Topic {
      public $id;
      public $title;
      public $body;
      public $userId;
      public $categoryId;


      public function __construct($id, $title, $body, $userId, $categoryId){
        $this->id = $id;
      	$this->title = $title;
      	$this->body = $body;
      	$this->userId = $userId;
      	$this->categoryId = $categoryId;
      }

}
