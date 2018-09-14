<?php

include_once("Model/Model.php");
include_once("View/View.php");

class Controller {
	private $model;

	public function construct($model = null){


		if($model != null){
			$this->model = $model;
		} else {

			$this->model = new Model();
		}
	}

	   /** The one function running the controller code.
     */
    public function invoke()
    {
        //try {
           // if (isset($_GET['submit'])) {
                // A specific book is selected - show the requested book
               // $Login = $this->model->getBookById($_GET['id']);
                $view = new View();
               	$view->create();
			//}
		
               /* if ($book) {
                    $view = new BookView(
                        $book,
                        self::OP_PARAM_NAME,
                        self::DEL_OP_NAME,
                        self::MOD_OP_NAME
                    );
                    $view->create();
                } else {
                    $view = new ErrorView();
                    $view->create();
                }
            } else {
                // Variable used to pass newly added books to the BookListView
                $newBook = null;
                //A book record is to be added, deleted, or modified
                if (isset($_POST[self::OP_PARAM_NAME])) {
                    switch ($_POST[self::OP_PARAM_NAME]) {
                    case self::ADD_OP_NAME:
                        $newBook = new Book(
                            $_POST['title'],
                            $_POST['author'],
                            $_POST['description']
                        );
                        $this->model->addBook($newBook);
                        break;
                    case self::DEL_OP_NAME:
                        $this->model->deleteBook($_POST['id']);
                        break;
                    case self::MOD_OP_NAME:
                        $book = new Book(
                            $_POST['title'],
                            $_POST['author'],
                            $_POST['description'],
                            $_POST['id']
                        );
                        $this->model->modifyBook($book);
                        break;
                    }
                }
                // no special book is requested, we'll show a list of all available books
                $books = $this->model->getBookList();
                $view = new BookListView(
                    $books,
                    self::OP_PARAM_NAME,
                    self::ADD_OP_NAME,
                    $newBook
                );
                $view->create();
            }
        } catch (InvalidArgumentException $e) {
            // User entered invalid data
            $view = new ErrorView('Invalid data received - please add valid book data');
            $view->create();
        } catch (PDOException $e) {
            // Database operation failed
            $view = new ErrorView('Database operation failed - please try again later');
            $view->create();
        } catch (Exception $e) {
            // Something else failed
            $view = new ErrorView();
            $view->create();
        }
    */
    }

}

?>