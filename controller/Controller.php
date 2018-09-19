<?php
include_once("model/DBModel.php");
include_once("view/ErrorView.php");
include_once("view/View.php");
include_once("model/User.php");
include_once("model/Category.php");

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
		   $user = new User($_POST['username'], $_POST['password']);

		   if($this->model->authenticate($user)) {
	    	        $_SESSION["username"] = $user->username;
		   }		   	
		   header("Refresh:0");
		}

		else if (isset($_POST['logout'])) {
		   session_unset();
		   session_destroy();

		   header("Refresh:0");
		}

		else if(isset($_GET['id'])) {
			$topic = $this->model->getTopicById($_GET['id']);
			$post = $this->model->getPostByTopicId($topic->id);
			$view->create("view/TopicPageview.php", []);
		}

		else if(isset($_GET['register'])) {
			$view = new View();
			$view->create("view/register.php", []);
		}

		else { 
			$view->create("view/HomePageView.php", [$categories, $latestTopics]);
		}
	}
}
?>