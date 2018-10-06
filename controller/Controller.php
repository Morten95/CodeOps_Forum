<?php
include_once("model/DBModel.php");
include_once("view/ErrorView.php");
include_once("view/View.php");
include_once("model/User.php");
include_once("model/Category.php");
include_once("model/Topic.php");
include_once("model/Post.php");
include_once("model/Comment.php");

/** The Controller is responsible for handling user requests, for exchanging data with the Model,
 * and for passing user response data to the various Views. 
 * @author Rune Hjelsvold
 * @see model/Model.php The Model class holding book data.
 * @see view/viewbook.php The View class displaying information about one book.
 * @see view/booklist.php The View class displaying information about all books.
 * @see http://php-html.net/tutorials/model-view-controller-in-php/ The tutorial code used as basis.
 */

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

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
		   $user = new User(-1, $_POST['username'],$_POST['password'], "", "", "", 0, 0);
		   $data['username'] = $_POST['username'];
		   $data['password'] = $_POST['password'];
		   $feedback = $this->model->authenticate($user);

		   if($feedback['status'] == "OK") {
	    	        $_SESSION["username"] = $user->username;
	    	        header("Refresh:0");
		   } else {
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

			// Fetch comments of posts
			$comments = $this->model->getCommentByPostId($post);
			
			// Fetch user of comments of POSTS
			$userComments = $this->model->getUserByComment($comments);
			
			$loggedUser = $this->model->getUserByName($_SESSION["username"]);

			$view->create("view/TopicPageView.php", [$topic, $topicUser, $post, $postUser, isset($_SESSION["username"]), $comments, $userComments, $loggedUser]);
		}

		// REGISTER USER:
		else if(isset($_GET['register'])) {
			$view->create("view/Register.php", []);
		}
		
		else if (isset($_POST['reg'])) {

			$userErr = "";
			$reguser = test_input($_POST['user']);
			$regpw = test_input(password_hash($_POST['password_1'], PASSWORD_DEFAULT));
			$regmail = test_input($_POST['email']);
			$regfname = test_input($_POST['fname']);
			$reglname = test_input($_POST['lname']);

			if (empty($_POST['user'])) {
				echo $userErr = "Username is required";
			}

			else if(!preg_match("/[a-zA-Z1-9_]+/",$reguser)) {
					echo $userErr = "ERROR! Can only contain letters and numbers!";
			}

			else if (empty($_POST['password_1'])) {
				echo $userErr = "Password is required";
			}

			else if(!preg_match("/[A-Za-z0-9_.&%@-]+/",$regpw)) {
					echo $userErr = "ERROR! Password cannot contain some of these characters!";
			}

			else if (empty($_POST['email'])) {
				echo $userErr = "Email is required";
			}

			else if (!filter_var($regmail, FILTER_VALIDATE_EMAIL)) {
					echo $userErr = "ERROR! Invalid Email format!";
			}

			else if (empty($_POST['fname'])) {
				echo $userErr = "First name is required";
			}

			else if(!preg_match("/[A-Za-z-]+/",$regfname)) {
					echo $userErr = "ERROR! First name can only contain letters!";
			}

			else if (empty($_POST['lname'])) {
				echo $userErr = "Last name is required";
			}

			else if(!preg_match("/[A-Za-z-]+/",$reglname)) {
					echo $userErr = "ERROR! Last name can only contain letters!";
			}

			else {
				$newUser = new User(-1,	$reguser = test_input($_POST['user']), $regpw = password_hash($_POST['password_1'], PASSWORD_DEFAULT), $regmail = $_POST['email'], $regfname = $_POST['fname'], $reglname = $_POST['lname'],0,0);
				$this->model->registerUser($newUser);
		   		header("Refresh:0");
		   	}
		}

		else if(isset($_POST['submitText'])) {
			$user = $this->model->getUserByName($_SESSION['username']);


			$post = new Post(0, $_POST['postarea'], $user->id, $_POST['topicId']);
			$this->model->createPost($post);
			$_GET['id'] = $_POST['topicId'];
			header('Location: '. $_POST['redirect']);

		}

		else if (isset($_GET['insert'])) {
		    $view->create("view/InsertView.php", [$categories]); 
		}
			// COMMENT
		else if (isset($_POST['sub_comment'])){
			$user = $this->model->getUserByName($_SESSION['username']);

			$comment = new Comment(0, $_POST['test'], $user->id, $_POST['post_rep']);
			$this->model->createComment($comment);
			$_GET['id'] = $_POST['topicId'];
			header('Location: ' . $_POST['redirect123']);

		}

		else if (isset($_POST['categoryId'])) {
		     $userId = $this->model->getUserIdByUsername($_SESSION['username']);
		     $topic = new Topic(0, $_POST['title'], $_POST['body'], $userId, (int)$_POST['categoryId']);
		     $this->model->createTopic($topic);
		     $view->create("view/HomePageView.php", [$categories, $latestTopics]);

		 }

		else if (isset($_POST['deletePost'])){
			
			$this->model->deletePostById(str_replace("/","",$_POST["postId"]));
			
			header('Location: ' . $_POST['redirect']);
		}

		else { 
			$view->create("view/HomePageView.php", [$categories, $latestTopics]);
		}
	}
}
?>