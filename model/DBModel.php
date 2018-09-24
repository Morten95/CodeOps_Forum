<?php

include("Topic.php");
include("Post.php");
include("User.php");
/** The Model is the class holding data about a collection of books. 
 * @author Rune Hjelsvold
 * @see http://php-html.net/tutorials/model-view-controller-in-php/ The tutorial code used as basis.
 */
class DBModel {        
    /**
      * The PDO object for interfacing the database
      *
      */
    protected $db = null;  
    
    public function __construct($db = null)  
    {  
	    if ($db) 
		{
			$this->db = $db;
		}
		else
		{
        try {
            // Create PDO connection

			$this->db = new PDO("mysql:host=localhost;dbname=CodeOps_database;", "root", "");
		} catch(PDOException $e) {
			echo "Error ocurred!";
			echo $e->getMessage();
		}}
    }
    
    public function authenticate($user) {
	    $request = $this->db->prepare("SELECT * FROM User WHERE username = :username AND password = :password");
	    $request->bindValue(':username', $user->username, PDO::PARAM_STR);
	    $request->bindValue(':password', $user->password, PDO::PARAM_STR);
	    $request->execute();
	    $results = $request->fetch(PDO::FETCH_ASSOC);
        $user->setUserData($results["id"], $results["email"],$results["name"],$results["surname"],$results["active"],$results["admin"]);
        if($results) {
            return true;
        } else {
            return false;
        }
    }

    public function registerUser($user) {
        try {        

            $stmt = $this->db->prepare("INSERT INTO User(username,password,email,name,surname,active,admin) VALUES(:user,:pass,:mail,:nm,:snm,:act,:adm)");
            
            
            $stmt->bindValue(':user', $user->username,PDO::PARAM_STR);
            $stmt->bindValue(':pass', $user->password,PDO::PARAM_STR);
            $stmt->bindValue(':mail', $user->email,PDO::PARAM_STR);
            $stmt->bindValue(':nm', $user->fname,PDO::PARAM_STR);
            $stmt->bindValue(':snm', $user->lname,PDO::PARAM_STR);
            $stmt->bindValue(':act', $user->active,PDO::PARAM_INT);
            $stmt->bindValue(':adm', $user->admin,PDO::PARAM_INT);
            
            $stmt->execute();
            $user->id = $this->db->lastInsertId();
        }
        catch(PDOException $e){
            $e->getMessage(); 
        }
}

    public function getLastTenTopics(){
        $topic = array();
        $stmt = $this->db->query("SELECT * FROM topic ORDER BY id DESC LIMIT 3");
	if($stmt) {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           // var_dump($row);
            $topic[] = new Topic($row["id"], $row["title"], $row["body"], $row["userId"], $row["categoryId"]);
        }}

        return $topic;
    }
    
    public function getAllCategories() {
        $request = $this->db->prepare("SELECT * FROM Category");
        $request->execute();

        $results = array();

        while($row = $request->fetch(PDO::FETCH_ASSOC)) {
           $results[] = new Category($row['id'], $row['name']);
        }	
        return $results;
    }

    public function getTopicById($id){
       // var_dump($id);
        $request = $this->db->prepare("SELECT * FROM Topic WHERE id = :id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();

        $topicDB = $request->fetch(PDO::FETCH_ASSOC);

        return new Topic($topicDB["id"], $topicDB["title"], $topicDB["body"], $topicDB["userId"], $topicDB["categoryId"]);
    }

    public function getUserByTopic($id){
        $request = $this->db->prepare("SELECT * FROM User WHERE id = :userId");
        $request->bindValue(':userId', $id, PDO::PARAM_INT);
        $request->execute();

        $row = $request->fetch(PDO::FETCH_ASSOC);
        $user = new User($row["id"], $row["username"], $row["password"], $row["email"], $row["name"], $row["surname"], $row["active"], $row["admin"]);

        var_dump($row);

        return $user;
    }
    
    public function getPostByTopicId($id){
        $post = array();
        $stmt = $this->db->prepare("SELECT * FROM Post WHERE topicId = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $post[] = new Post($row["id"], $row["body"], $row["userId"], $row["topicId"]);
        }

        return $post;
    }



    public function getUserByPost($posts){
        $users = array();
        foreach ($posts as $post) {
            $request = $this->db->prepare("SELECT * FROM User WHERE id = :id");
            $request->bindValue(':id', $post->id, PDO::PARAM_INT);
            $request->execute();
            
            $user = $request->fetch(PDO::FETCH_ASSOC);

            $users[] = new User($user["id"], $user["username"],$user["password"],$user["email"],$user["name"],$user["surname"],$user["active"],$user["admin"]);

        }

        //var_dump($users);
        return $users;
    }
}
?>