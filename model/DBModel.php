<?php

include("Topic.php");
include("Post.php");
include("User.php");
include("Comment.php");


class DBModel {
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
			$this->db = new PDO("mysql:host=localhost;dbname=CodeOps_database;", "root", "");
		} catch(PDOException $e) {
			echo "Error ocurred!";
			echo $e->getMessage();
		}}
    }

      // Authenticates a user login, else error
    public function authenticate($user) {
        $data= [];

            $request = $this->db->prepare("SELECT * FROM User WHERE username = :username");
            $request->bindValue(':username', $user->username, PDO::PARAM_STR);
            $request->execute();
            $results = $request->fetch(PDO::FETCH_ASSOC);
            $user->setUserData($results["id"], $results["email"],$results["name"],$results["surname"],$results["active"],$results["admin"]);
            if(password_verify($user->password, $results['password'])) {
                $data['status'] = "OK";
            } else {
                $data['status'] = "Error";
                $data ['errormessage'] = 'Something went wrong';
            }
	    return $data;
    }
        // Returns arroay of Topics by ID
    public function getAllTopicsById($id) {
            $request = $this->db->prepare("SELECT * FROM Topic WHERE categoryId = :categoryId");
            $request->bindValue(':categoryId', $id, PDO::PARAM_STR);
            $request->execute();
	    $topics = array();
            while($result = $request->fetch(PDO::FETCH_ASSOC)) {
	    		 $topics[] = new Topic($result["id"], $result["title"], $result["body"], $result["userID"], $result["categoryId"]);
	}
	    return $topics;
    }

        // Returns a int of username
    public function getUserIdByUsername($username) {
	$request = $this->db->prepare("SELECT * FROM User WHERE username = :username");
	$request->bindValue(':username', $username, PDO::PARAM_STR);
	$request->execute();
	$results = $request->fetch(PDO::FETCH_ASSOC);
	return (int)$results["id"];
    }
        // Creates a new Topic
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
        // Registers a new User
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
        // Returns last 10 Topics (to front page)
    public function getLastTenTopics(){
        $topic = array();
        $stmt = $this->db->query("SELECT * FROM Topic ORDER BY id DESC LIMIT 3");
	if($stmt) {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $topic[] = new Topic($row["id"], $row["title"], $row["body"], $row["userID"], $row["categoryId"]);
        }}

        return $topic;
    }
        // Returns all topics
    public function getAllCategories() {
        $request = $this->db->prepare("SELECT * FROM Category");
        $request->execute();

        $results = array();

        while($row = $request->fetch(PDO::FETCH_ASSOC)) {
           $results[] = new Category($row['id'], $row['name']);
        }
        return $results;
    }
        // Returns Topic values by ID
    public function getTopicById($id){
        $request = $this->db->prepare("SELECT * FROM Topic WHERE id = :id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();

        $topicDB = $request->fetch(PDO::FETCH_ASSOC);

        return new Topic($topicDB["id"], $topicDB["title"], $topicDB["body"], $topicDB["userID"], $topicDB["categoryId"]);
    }
        // Returns User values by ID
    public function getUserByTopic($id){
        $request = $this->db->prepare("SELECT * FROM User WHERE id = :userId");
        $request->bindValue(':userId', $id, PDO::PARAM_INT);
        $request->execute();

        $row = $request->fetch(PDO::FETCH_ASSOC);
        $user = new User($row["id"], $row["username"], $row["password"], $row["email"], $row["name"], $row["surname"], $row["active"], $row["admin"]);

        return $user;
    }
        // Returns Post values by ID
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
        // Returns Comment values
    public function getCommentByPostId($postArray){
        $comment = array();
        foreach ($postArray as $post){
            $stmt = $this->db->prepare("SELECT * FROM Comment WHERE postID = :id");
            $stmt->bindValue(':id', $post->id, PDO::PARAM_INT);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $comment[] = new Comment($row['id'], $row['postID'], $row['userID'], $row['body']);
            }
        }
        return $comment;
    }
        // Returns User values by Comments
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
        // Returns User values by Post
    public function getUserByPost($posts){
        $users = array();
        foreach ($posts as $post) {
            $request = $this->db->prepare("SELECT * FROM User WHERE id = :id");
            $request->bindValue(':id', $post->userId, PDO::PARAM_INT);
            $request->execute();
            $user = $request->fetch(PDO::FETCH_ASSOC);
            $users[] = new User($user["id"], $user["username"],$user["password"],$user["email"],$user["name"],$user["surname"],$user["active"],$user["admin"]);
        }
        return $users;
    }
        // Creates a new Post
     public function createPost($post) {
        try {
            $request = $this->db->prepare("INSERT INTO Post(body, userId, topicId) VALUES(:body, :userId, :topicId)");
            $request->bindValue(':body', $post->body, PDO::PARAM_STR);
            $request->bindValue(':userId', $post->userId, PDO::PARAM_INT);
            $request->bindValue(':topicId', $post->topicId, PDO::PARAM_INT);
            $request->execute();
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
        // Creates a new Comment to a post
    public function createComment($comment) {
        try {
            $request = $this->db->prepare("INSERT INTO Comment(postID, userID, body) VALUES(:postId, :userId, :body)");
            $request->bindValue(':postId', $comment->postID, PDO::PARAM_INT);
            $request->bindValue(':userId', $comment->userID, PDO::PARAM_INT);
            $request->bindValue(':body', $comment->body, PDO::PARAM_STR);
            $request->execute();
        }
        catch(PDOException $e){
            $e->getMessage();
        }
   }
        // Returns User values
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
        // Deletes a Post by ID
    public function deletePostById($id){
        $this->deleteCommentByPostId($id);
        $request = $this->db->prepare("DELETE FROM Post WHERE id = :id");
        $request->bindValue(":id", $id, PDO::PARAM_INT);
        $response = $request->execute();
        if($response){
            return true;
        }
        return false;
    }
        // Deletes a Comment by ID
    public function deleteCommentByPostId($postId){
        $request = $this->db->prepare("DELETE FROM Comment WHERE postId = :id");
        $request->bindValue(":id", $postId, PDO::PARAM_INT);
        $response = $request->execute();
    }
        // Deletes a Topic by ID
    public function deleteTopicById($id) {

        $this->deletePostByTopicId($id);

        $request = $this->db->prepare("DELETE FROM Topic WHERE id = :id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();
    }
        // Deletes a Post by Topic ID
    public function deletePostByTopicId($id){
        $posts = $this->getPostByTopicId($id);            // Get all posts related to topic id.

        foreach ($posts as $post) {                         // Loop through posts
            $this->deleteCommentByPostId($post->id);        // Delete all comments related to that post id.
        }

        // Delete Posts related to the topic id.
        $request = $this->db->prepare("DELETE FROM Post WHERE topicId = :id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();
    }
        // Deletes a comment by ID
    public function deleteCommentById($id){
        $request = $this->db->prepare("DELETE FROM Comment WHERE id = :id");
        $request->bindValue(":id", $id, PDO::PARAM_INT);
        $response = $request->execute();
    }
        // Searches database for a sendt string in Topic and returns Topic Values
    function getTopicSearchResults($searchKeyword){
        $topicArray = array();
        $request = $this->db->prepare("SELECT * FROM Topic WHERE title LIKE ('%" . $searchKeyword . "%') OR body LIKE ('%" . $searchKeyword . "%')");
        $request->bindParam(':searchWord', $searchKeyword, PDO::PARAM_STR);
        $request->execute();
        while($row = $request->fetch(PDO::FETCH_ASSOC)){
          $topicArray[] = new Topic($row['id'], $row['title'], $row['body'], $row['userID'], $row['categoryId']);
        }
        return $topicArray;
    }
        // Searches database for a sendt string in Post and returns Post Values
    function getPostSearchResults($searchKeyword){
        $postArray = array();
        $request = $this->db->prepare("SELECT * FROM Post WHERE body LIKE ('%" . $searchKeyword . "%')");
        $request->bindValue(':searchWord', $searchKeyword, PDO::PARAM_STR);
        $request->execute();
        while($row = $request->fetch(PDO::FETCH_ASSOC)){
          $postArray[] = new Post($row['id'], $row['body'], $row['userId'], $row['topicId']);
        }
        return $postArray;
    }
        // Searches database for a sendt string in Comment and returns Comment Values
    function getCommentSearchResults($searchKeyword){
        $commentArray = array();
        $request = $this->db->prepare("SELECT * FROM Comment WHERE body LIKE ('%" . $searchKeyword . "%')");
        $request->bindValue(':searchWord', $searchKeyword, PDO::PARAM_STR);
        $request->execute();
        while($row = $request->fetch(PDO::FETCH_ASSOC)){
          $commentArray[] = new Comment($row['id'], $row['postID'], $row['userID'], $row['body']);
        }
        return $commentArray;
    }
}
?>
