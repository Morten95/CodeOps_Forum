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

      public function createTopic($topic) {

            $db = new PDO("mysql:host=localhost;dbname=codeops_database;", "root", "");
	    $request = $db->prepare("INSERT INTO Post(id, title, body, userId, categoryId) VALUE(:id, :title, :body, :userId, :categoryId)");
	    $request->bindValue(':id', $this->id, PDO::PARAM_INT);
	    $request->bindValue(':title', $this->title, PDO::PARAM_STR);
	    $request->bindValue(':body', $this->body, PDO::PARAM_STR);
          $request->bindValue(':userId', $this->userId, PDO::PARAM_INT);
	    $request->bindValue(':categoryId', $this->categoryId, PDO::PARAM_INT);
	    $request->execute();
	    $results = $request->fetch(PDO::FETCH_ASSOC);

	if($results) {
	    return true;
	} else {
	    return false;
	    }
      }



}
