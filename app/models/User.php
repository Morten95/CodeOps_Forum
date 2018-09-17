<?php

class User {
      public $username;
      public $password;

      public function authenticate() {
      	    $db = new PDO("mysql:host=localhost;dbname=database;", "root", ""); 
	    $request = $db->prepare("SELECT * FROM User WHERE username = :username AND password = :password");
	    $request->bindValue(':username', $this->username, PDO::PARAM_STR);
	    $request->bindValue(':password', $this->password, PDO::PARAM_STR);
	    $request->execute();
	    $results = $request->fetch(PDO::FETCH_ASSOC);

	if($results) {
	    return true;
	} else {
	    return false;
	    }
      }
}