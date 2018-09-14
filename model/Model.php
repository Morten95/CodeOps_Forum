<?php

require_once("IModel.php");

class Model extends IModel
{
    protected $db = null;
    
    /**
     * @param PDO $db PDO object for the database; a new one will be created if no PDO object
     *                is passed
     * @todo Implement function using PDO and a real database.
     * @throws PDOException
     */
    public function construct($db = null)
    {
        if ($db) {
            $this->db = $db;
        } else {
            // Create PDO connection
            $this->db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root','', array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } 
        
    }

    public function getBookList()
    {   
    }
    
    /** Function retrieving information about a given book in the collection.
     * @param integer $id the id of the book to be retrieved
     * @return Book|null The book matching the $id exists in the collection; null otherwise.
     * @todo Implement function using PDO and a real database.
     * @throws PDOException
     */
    public function getBookById($id)
    {   
        
       
        
    }
    
    /** Adds a new book to the collection.
     * @param Book $book The book to be added - the id of the book will be set after successful insertion.
     * @todo Implement function using PDO and a real database.
     * @throws PDOException
     */
    public function addBook($book)
    {  

        
    }


    /** Modifies data related to a book in the collection.
     * @param Book $book The book data to be kept.
     * @todo Implement function using PDO and a real database.
     * @throws PDOException
    */
    public function modifyBook($book)
    {
        
    }

    /** Deletes data related to a book from the collection.
     * @param $id integer The id of the book that should be removed from the collection.
     * @todo Implement function using PDO and a real database.
     * @throws PDOException
    */
    public function deleteBook($id)
    {   
     
    }
}
