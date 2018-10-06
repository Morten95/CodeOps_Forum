<?php

include("Topic.php");
include("Post.php");
include("User.php");
include("Comment.php");

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
        $data= [];

        try {
            $request = $this->db->prepare("SELECT * FROM User WHERE username = :username");
            $request->bindValue(':username', $user->username, PDO::PARAM_STR);
            $request->execute();
            $results = $request->fetch(PDO::FETCH_ASSOC);
            $user->setUserData($results["id"], $results["email"],$results["name"],$results["surname"],$results["active"],$results["admin"]);
            //var_dump($results['password']);
            if(password_verify($user->password, $results['password'])) {
                $data['status'] = "OK";
            } else {
                $data['status'] = "FAIL";
                $data['plain_pass'] = $user->password;
                $data['hash_pass_db'] = $results['password'];
            }
        } catch(Exception $error){
            // Dont use in production, just for testing.
            $data['status'] = "FAIL";
            $data['errorMessage'] = 'Something failed with the query';
            $data['errorInfo'] = $request->errorInfo();
        }
	    return $data;
    }

    public function getUserIdByUsername($username) {
	$request = $this->db->prepare("SELECT * FROM User WHERE username = :username");
	$request->bindValue(':username', $username, PDO::PARAM_STR);
	$request->execute();
	$results = $request->fetch(PDO::FETCH_ASSOC);
	return (int)$results["id"];
    }

    public function createTopic($topic) {
    try {
    	   $request = $this->db->prepare("INSERT INTO Topic(title, body, userID, categoryId) VALUES(:title, :body, :userID, :categoryId)");
            $request->bindValue(':title', $topic->title, PDO::PARAM_STR);
            $request->bindValue(':body', $topic->body, PDO::PARAM_STR);
            $request->bindValue(':userID', $topic->userId, PDO::PARAM_INT);
            $request->bindValue(':categoryId', $topic->categoryId, PDO::PARAM_INT);
            
            $request->execute();
	    } catch (PDOException $e) {
	     $e->getMessage();
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
        $stmt = $this->db->query("SELECT * FROM Topic ORDER BY id DESC LIMIT 3");
	if($stmt) {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           // var_dump($row);
            $topic[] = new Topic($row["id"], $row["title"], $row["body"], $row["userID"], $row["categoryId"]);
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

        return new Topic($topicDB["id"], $topicDB["title"], $topicDB["body"], $topicDB["userID"], $topicDB["categoryId"]);
    }

    public function getUserByTopic($id){
        $request = $this->db->prepare("SELECT * FROM User WHERE id = :userId");
        $request->bindValue(':userId', $id, PDO::PARAM_INT);
        $request->execute();

        $row = $request->fetch(PDO::FETCH_ASSOC);
        $user = new User($row["id"], $row["username"], $row["password"], $row["email"], $row["name"], $row["surname"], $row["active"], $row["admin"]);

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

    public function getCommentByPostId($postArray){
        $comment = array();
        foreach ($postArray as $post){
            $stmt = $this->db->prepare("SELECT * FROM Comment WHERE postID = :id");
            //var_dump($post);
            $stmt->bindValue(':id', $post->id, PDO::PARAM_INT);
            $stmt->execute();
            //var_dump($stmt);

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $comment[] = new Comment($row['id'], $row['postID'], $row['userID'], $row['body']);
            }
        }

        return $comment;
    }


    public function getUserByComment($comments){
        $users = array();
        foreach ($comments as $comment) {
            $stmt = $this->db->prepare("SELECT * FROM User WHERE id = :id");
            $stmt->bindValue(':id', $comment->userID, PDO::PARAM_INT);
            $stmt->execute();
        
            while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
                $users[] = new User($user["id"], $user["username"],$user["password"],$user["email"],$user["name"],$user["surname"],$user["active"],$user["admin"]);
            }
        }
        return $users;
    }

    

    public function getUserByPost($posts){
        $users = array();
        foreach ($posts as $post) {
            $request = $this->db->prepare("SELECT * FROM User WHERE id = :id");
            $request->bindValue(':id', $post->userId, PDO::PARAM_INT);
            $request->execute();
            
            $user = $request->fetch(PDO::FETCH_ASSOC);

            $users[] = new User($user["id"], $user["username"],$user["password"],$user["email"],$user["name"],$user["surname"],$user["active"],$user["admin"]);

        }
        //var_dump($users);
        return $users;
    }

     public function createPost($post) {

        $request = $this->db->prepare("INSERT INTO Post(body, userId, topicId) VALUES(:body, :userId, :topicId)");
        $request->bindValue(':body', $post->body, PDO::PARAM_STR);
        $request->bindValue(':userId', $post->userId, PDO::PARAM_INT);
        $request->bindValue(':topicId', $post->topicId, PDO::PARAM_INT);
        $request->execute();  
    }

    public function createComment($comment) {

        $request = $this->db->prepare("INSERT INTO Comment(postID, userID, body) VALUES(:postId, :userId, :body)");
        $request->bindValue(':postId', $comment->postID, PDO::PARAM_INT);
        $request->bindValue(':userId', $comment->userID, PDO::PARAM_INT);
        $request->bindValue(':body', $comment->body, PDO::PARAM_STR);
        $request->execute();  
   }

    public function getUserByName($userName){
        $request = $this->db->prepare("SELECT * FROM User WHERE username = :username");
        $request->bindValue(':username', $userName, PDO::PARAM_STR);
        $request->execute();
        $row = $request->fetch(PDO::FETCH_ASSOC);
        if($row)
            return new User($row["id"], $row["username"], $row["password"], $row["email"], $row["name"], $row["surname"], $row["active"], $row["admin"]);
        else 
            return null;
    }
}
?>