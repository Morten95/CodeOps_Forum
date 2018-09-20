<?php

include("Topic.php");
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
			$this->db = new PDO("mysql:host=localhost;dbname=CodeOps_Forum;", "root", "");
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

	if($results) {
	    return true;
	} else {
	    return false;
	    }
      }

    public function regUser($User) {
        try {        

            $stmt = $this->db->prepare("INSERT INTO User(username,password,email,name,surname,active,admin) VALUES(:user,:pass,:mail,:nm,:snm,:act,:adm)");
            
            
            $stmt->bindValue(':user', $User->username,PDO::PARAM_STR);
            $stmt->bindValue(':pass', $User->password,PDO::PARAM_STR);
            $stmt->bindValue(':mail', $User->email,PDO::PARAM_STR);
            $stmt->bindValue(':nm', $User->fname,PDO::PARAM_STR);
            $stmt->bindValue(':snm', $User->lname,PDO::PARAM_STR);
            $stmt->bindValue(':act', 0,PDO::PARAM_INT);
            $stmt->bindValue(':adm', 0,PDO::PARAM_INT);
            
            $stmt->execute();
        }
        catch(PDOException $e){
            $e->getMessage(); 
        }
}

    /*public function getLastTenTopics(){
        $topic = array();
        $stmt = $this->db->query("SELECT * FROM topic ORDER BY id DESC LIMIT 3");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           // var_dump($row);
            $topic[] = new Topic($row["id"], $row["title"], $row["body"], $row["userId"], $row["categoryId"]);
        }

        return $topic;
    }*/
    
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
        $request = $this->db->prepare("SELECT * FROM Topic WHERE id = :id");
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        $request->execute();

        $topicDB = $request->fetch(PDO::FETCH_ASSOC);

        return new Topic($topicDB["id"], $topicDB["title"], $topicDB["body"], $topicDB["userId"], $topicDB["categoryId"]);
    }
    
    public function getPostByTopicId($id){
        $request = $this->db->prepare("SELECT * FROM Post WHERE topicId = :id");
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        $request->execute();

        $posts = array();
        while($row = $request->fetch(PDO::FETCH_ASSOC)){
            $posts = new Post($row["id"], $row["body"], $row["userId"], $row["topicId"]);
        }

        return $posts;
    }
}
?>