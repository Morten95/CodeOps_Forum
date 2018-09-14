<?php

abstract class IModel
{

    abstract public function getBookList();
    
   
    abstract public function getBookById($id);
    
   
    abstract public function addBook($book);

   
    abstract public function modifyBook($book);

    
    abstract public function deleteBook($id);

    
    public static function verifyId($id)
    {
    
    }
   
    public static function verifyBook($book, $ignoreId = false)
    {
 
    }
}
