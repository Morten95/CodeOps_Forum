<?php

class Post {
      public $id;
      public $body;
      public $userId;
      public $topicId;

      
      public function __construct($id, $body, $userId, $topicId){
      	$this->id = $id;
      	$this->body = $body;
      	$this->userId = $userId;
      	$this->topicId = $topicId;
      }

      public function createPost($post) {

      	$db = new PDO("mysql:host=localhost;dbname=codeops_database;", "root", ""); 
	    $request = $db->prepare("INSERT INTO Post(id, body, userId, topicId) VALUE(:id, :body, :userId, :topicId)");
	    $request->bindValue(':id', $this->id, PDO::PARAM_INT);
	    $request->bindValue(':body', $this->body, PDO::PARAM_STR);
	    $request->bindValue(':userId', $this->userId, PDO::PARAM_INT);
	    $request->bindValue(':topicId', $this->topicId, PDO::PARAM_INT);
	    $request->execute();
	    $results = $request->fetch(PDO::FETCH_ASSOC);

	if($results) {
	    return true;
	} else {
	    return false;
	    }
      }
}