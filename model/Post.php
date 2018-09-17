<?php

/** The Model is the class holding data related to one book. 
 * @author Rune Hjelsvold
 * @see http://php-html.net/tutorials/model-view-controller-in-php/ The tutorial code used as basis.
 */
class Post {
	public $id;
	public $body;
	public $userId;

/** Constructor
 * @param string $title Book title
 * @param string $author Book author 
 * @param string $description Book description 
 * @param integer $id Book id (optional) 
 */
	public function construct($id = -1, $body, $userId)  
    {  
        $this->id = $id;
        $this->body = $body;
	    $this->userId = $userId;
    } 
}

?>