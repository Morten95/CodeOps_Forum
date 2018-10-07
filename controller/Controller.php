<?php
include_once("model/DBModel.php");
include_once("view/View.php");
include_once("model/User.php");
include_once("model/Category.php");
include_once("model/Topic.php");
include_once("model/Post.php");
include_once("model/Comment.php");

class Controller {
	public $model;

	public function __construct() {
	       session_start();
	       $this->model = new DBModel();
	}

	public function invoke() {
		//loading front page
		$categories = $this->model->getAllCategories();
		$latestTopics = $this->model->getLastTenTopics();
		$view = new View();

		if (isset($_POST['username']) && isset($_POST['password'])) {
		   $userData = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
		   $user = new User(-1, $userData,$_POST['password'], "", "", "", 0, 0);
		   $feedback = $this->model->authenticate($user);

		   if($feedback['status'] == "OK") {
	    	        $_SESSION["username"] = $user->username;
	    	        $_SESSION["token"] = md5(uniqid(mt_rand(), true));
	    	        header("Refresh:0");
		   }
		   else {
			echo '<script>
			alert("Wrong username or password");
			</script>';
			header("Refresh:0");
		   }
		}

		else if (isset($_POST['logout'])) {
			if($_GET["csrf"] == $_SESSION["token"]){
		   		session_unset();
		   		session_destroy();
			}

		   header("Refresh:0");
		}

		else if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			$topic = $this->model->getTopicById($_GET['id']);
			$topicUser = $this->model->getUserByTopic($topic->userId);

			$post = $this->model->getPostByTopicId($topic->id);
			$postUser = $this->model->getUserByPost($post);

			// Fetch comments of posts
			$comments = $this->model->getCommentByPostId($post);

			// Fetch user of comments of POSTS
			$userComments = $this->model->getUserByComment($comments);

			if(isset($_SESSION["username"])){
				$loggedUser = $this->model->getUserByName($_SESSION["username"]);
			} else {
				$loggedUser = null;
			}

			$view->create("view/TopicPageView.php", [$topic, $topicUser, $post, $postUser, isset($_SESSION["username"]), $comments, $userComments, $loggedUser]);
		}

		// REGISTER USER:
		else if(isset($_GET['register'])) {
			if(!isset($_SESSION["username"])){
				$view->create("view/Register.php", []);
			} else {
			 	header('Location: index.php');
			}
		}
        // Registers new User and sanatizes sendt values
		else if (isset($_POST['reg'])) {

			$reguser = filter_var($_POST['userr'],FILTER_SANITIZE_STRING);
			$regmail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL); 
			$regfname = filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
			$reglname = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);


				$newUser = new User(-1,	$reguser, password_hash($_POST['password_1'], PASSWORD_DEFAULT), $regmail, $regfname, $reglname,0,0);

				$this->model->registerUser($newUser);
		   		header("Refresh:0");
		}

		else if (isset($_GET['insert'])) {
			if($_GET["csrf"] == $_SESSION["token"]){
		    	$view->create("view/InsertView.php", [$categories]);
			} else {
			 	header('Location: index.php');
			}
		}
			//Post
		else if(isset($_POST['submitText'])) {

			$user = $this->model->getUserByName($_SESSION['username']);

			$post = new Post(0, filter_var($_POST['postarea'], FILTER_SANITIZE_STRING), $user->id, $_POST['topicId']);
			$this->model->createPost($post);
			$_GET['id'] = $_POST['topicId'];
			header('Location: index.php?id='. str_replace("/","",$_GET['id']));

		}	// COMMENT
		else if (isset($_POST['sub_comment'])){
			$user = $this->model->getUserByName($_SESSION['username']);

			$comment = new Comment(0, $_POST['test'], $user->id, filter_var($_POST['post_rep'], FILTER_SANITIZE_STRING));
			$this->model->createComment($comment);
			$_GET['id'] = $_POST['topicId'];
			$id = str_replace("/CodeOps_Forum/index.php?id=","",$_POST['redirect123']);
			$id = str_replace("/", "", $id);
			header('Location: index.php?id='. str_replace("/","",$id));
		}
		else if (isset($_POST['categoryId'])) {
			$userId = $this->model->getUserIdByUsername($_SESSION['username']);

			if($_GET["csrf"] == $_SESSION["token"]){
				$topic = new Topic(0, filter_var($_POST['title'], FILTER_SANITIZE_STRING), filter_var($_POST['body'], FILTER_SANITIZE_STRING), $userId, (int)$_POST['categoryId']);
				$this->model->createTopic($topic);
				header("Refresh:0");
				$view->create("view/HomePageView.php", [$categories, $latestTopics]);
			} else {
				header('Location: index.php');
			}
        // Recives a Search string sanatizes it, send the string to search topic, post and comment. Then sends values to SearchResults and desplays them
		 }else if (isset($_GET['search'])) {
		 	if($_POST["Search"] != "" && $_GET["csrf"] == $_SESSION["token"]){
				$searchKeywordDirty = $_POST["Search"];
				$searchKeyword = htmlentities($searchKeywordDirty, ENT_QUOTES | ENT_HTML5, 'UTF-8');
			 	$topic = $this->model->getTopicSearchResults($searchKeyword);
			 	$post = $this->model->getPostSearchResults($searchKeyword);
			 	$comment = $this->model->getCommentSearchResults($searchKeyword);

			 	$view->create("view/SearchResults.php", [$searchKeyword, $topic, $post, $comment]);
		 	} else {
			 header('Location: index.php');
		 	}
		}
        // Deletes Post
		 else if (isset($_POST['deletePost'])){
			 $this->model->deletePostById(str_replace("/CodeOps_Forum/index.php?id=","",$_POST["postId"]));
			 $id = str_replace("/CodeOps_Forum/index.php?id=","",$_POST['redirect']);
			 $id = str_replace("/", "", $id);
			 header('Location: index.php?id=' . $id);
		 }
        // Deletes Comment
		 else if (isset($_POST['deleteComment'])){
			 $this->model->deleteCommentById(str_replace("/CodeOps_Forum/index.php?id=","",$_POST["commentId"]));
			 $id = str_replace("/CodeOps_Forum/index.php?id=","",$_POST['redirect']);
			 $id = str_replace("/", "", $id);
			 header('Location: index.php?id=' . $id);
		 }
		 // Desplays categories
		 else if (isset($_GET['category'])) {

		 	if(isset($_SESSION["username"]) &&  $_GET["csrf"] == $_SESSION["token"]){
			 	$user = $this->model->getUserByName($_SESSION["username"]);
				$topics = $this->model->getAllTopicsById($_GET['category']);
				$view->create("view/TopicView.php", [$topics, isset($_SESSION["username"]), $user]);
		 	} else {
				header('Location: index.php');
		 	}
		}
        // Deletes Topic and updates homepage
		 else if (isset($_POST['topicIdd'])) {
			 $this->model->deleteTopicById($_POST['topicIdd']);
			 $view->create("view/HomePageView.php", [$categories, $latestTopics]);
			header("Refresh:0");
		 }

		else {

			$view->create("view/HomePageView.php", [$categories, $latestTopics]);
		}
	}
}
?>
