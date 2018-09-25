<?php
include_once("model/DBModel.php");
include_once("view/ErrorView.php");
include_once("view/View.php");
include_once("model/User.php");
include_once("model/Category.php");
include_once("model/Topic.php");
include_once("model/Post.php");

/** The Controller is responsible for handling user requests, for exchanging data with the Model,
 * and for passing user response data to the various Views. 
 * @author Rune Hjelsvold
 * @see model/Model.php The Model class holding book data.
 * @see view/viewbook.php The View class displaying information about one book.
 * @see view/booklist.php The View class displaying information about all books.
 * @see http://php-html.net/tutorials/model-view-controller-in-php/ The tutorial code used as basis.
 */
class Controller {
	public $model;
	
	public function __construct() {  
	       session_start();
	       $this->model = new DBModel();
	} 
	
/** The one function running the controller code.
 */
	public function invoke() {
		//loading front page
		$categories = $this->model->getAllCategories();
		$latestTopics = $this->model->getLastTenTopics();
		$view = new View();

		if (isset($_POST['username']) && isset($_POST['password'])) {
		   $user = new User(-1, $_POST['username'], $_POST['password'], "", "", "", 0, 0);
		   if($this->model->authenticate($user)) {
	    	        $_SESSION["username"] = $user->username;
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
		   session_unset();
		   session_destroy();

		   header("Refresh:0");
		}
		else if(isset($_GET['id'])) {
			$topic = $this->model->getTopicById($_GET['id']);
			$topicUser = $this->model->getUserByTopic($topic->userId);
			
			$post = $this->model->getPostByTopicId($topic->id);
			$postUser = $this->model->getUserByPost($post);
			
			$view->create("view/TopicPageView.php", [$topic, $topicUser, $post, $postUser, isset($_SESSION["username"])]);
		}
		// REGISTER USER:
		else if(isset($_GET['register'])) {
			$view->create("view/Register.php", []);
		}
		
		else if (isset($_POST['reg'])) {
				
			$newUser = new User(-1, $_POST['user'],$_POST['password_1'],$_POST['fname'], $_POST['lname'] ,$_POST['email'],0,0);
			$this->model->registerUser($newUser);
		   header("Refresh:0");
		} 
		else if(isset($_POST['postarea'])) {
			$user = $this->model->getUserByName($_SESSION['username']);
echo 'zohaibsyolo';
			if($user){
				$post = new Post(0, $_POST['postarea'], $user->id, $_GET['id']);
				$this->model->createPost($post);
}}
		else if (isset($_GET['insert'])) {
		    $view->create("view/InsertView.php", [$categories]); 
		}

		else if (isset($_POST['categoryId'])) {
		     $userId = $this->model->getUserIdByUsername($_SESSION['username']);
		     $topic = new Topic(0, $_POST['title'], $_POST['body'], $userId, (int)$_POST['categoryId']);
		     $this->model->createTopic($topic);
		     $view->create("view/HomePageView.php", [$categories, $latestTopics]);
		}

		else { 
			$view->create("view/HomePageView.php", [$categories, $latestTopics]);
		}
	}
}
?>