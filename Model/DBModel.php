<?php
include_once("IModel.php");
include_once("Book.php");

/** The Model is the class holding data about a collection of books. 
 * @author Rune Hjelsvold
 * @see http://php-html.net/tutorials/model-view-controller-in-php/ The tutorial code used as basis.
 */
class DBModel implements IModel
{        
    /**
      * The PDO object for interfacing the database
      *
      */
    protected $db = null;  
    
    /**
	 * @throws PDOException
     */
    public function __construct($db = null)  
    {  
	    if ($db) 
		{
			$this->db = $db;
		}
		else
		{
            // Create PDO connection
		try {
			$this->db = new PDO("mysql:host=localhost;dbname=test;", "root", "");
		} catch(PDOException $e) {
			echo "Error ocurred!";
			echo $e->getMessage();
		}}
    }
    
    /** Function returning the complete list of books in the collection. Books are
     * returned in order of id.
     * @return Book[] An array of book objects indexed and ordered by their id.
	 * @throws PDOException
     */
    public function getBookList()
    {
	try {
        $request = $this->db->prepare("SELECT * FROM book");
	   $request->execute();
	   $results = $request->fetchAll(PDO::FETCH_ASSOC);
	   $booklist = array();
		
       if($results){ 
          foreach($results as $id=>$result) {
			 $booklist[$id] = new Book($result["title"], $result["author"], $result["description"], $result["id"]);
		  }
           return $booklist;
       }else {
           return $booklist = null;
       }
	}catch(PDOException $e) {
		echo "Error ocurred!";
		echo $e->getMessage();
	}
    }
    
    /** Function retrieving information about a given book in the collection.
     * @param integer $id the id of the book to be retrieved
     * @return Book|null The book matching the $id exists in the collection; null otherwise.
	 * @throws PDOException
     */
    public function getBookById($id)
    {
	try {
		$request = $this->db->prepare("SELECT * FROM book WHERE id =" . $id);
		$request->execute();
		$results = $request->fetch(PDO::FETCH_ASSOC);
	   
        if($results){
            $book = new Book($results["title"], $results["author"], $results["description"], $results["id"]);
       		return $book;   
        } else {
            return $book = null;
        }
		
    	}catch(PDOException $e) {
		echo "Error ocurred!";
		echo $e->getMessage();
	}
    }    
    /** Adds a new book to the collection.
     * @param $book Book The book to be added - the id of the book will be set after successful insertion.
	 * @throws PDOException
     */
    public function addBook($book)
    {
	try {
		$request = $this->db->prepare("INSERT INTO book (title, author, description) VALUES (:title, :author, :description)");
		  $request->bindValue(':title', $book->title, PDO::PARAM_STR);
          $request->bindValue(':author', $book->author, PDO::PARAM_STR);
          $request->bindValue(':description', $book->description, PDO::PARAM_STR);
        if($book->title != '' && $book->author != ''){
            $request->execute();
        } else {
             echo "Every book must have a title and an author.";
        }
        $book->id = $this->db->lastInsertId();
	}catch(PDOException $e) {
		echo "Error ocurred!";
		echo $e->getMessage();
	}
    }

    /** Modifies data related to a book in the collection.
     * @param $book Book The book data to be kept.
     * @todo Implement function using PDO and a real database.
     */
    public function modifyBook($book)
    {
	try {
		$request = $this->db->prepare("UPDATE book SET title = :tit, author = :auth, description = :des WHERE id = :id");
            $request->bindValue(':tit', $book->title, PDO::PARAM_STR);
            $request->bindValue(':auth', $book->author, PDO::PARAM_STR);
            $request->bindValue(':des', $book->description, PDO::PARAM_STR);
            $request->bindValue(':id', $book->id, PDO::PARAM_STR);
        if($book->title != '' && $book->author != ''){
		  $request->execute();
        } else {
             echo "Every book must have a title and an author.";
        }
	}catch(PDOException $e) {
		echo "Error ocurred!";
		echo $e->getMessage();
	}
    }

    /** Deletes data related to a book from the collection.
     * @param $id integer The id of the book that should be removed from the collection.
     */
    public function deleteBook($id)
    {
	try {
		$request = $this->db->prepare("DELETE FROM Book WHERE id = '" . $id . "'");
		$request->execute();
	}catch(PDOException $e) {
		echo "Error ocurred!";
		echo $e->getMessage();
	}
    }
	
}

?>
