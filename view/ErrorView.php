<?php
include_once('View.php');

Class ErrorView extends View {
	protected $message = null;
		 
	public function __construct($msg = null)
	{
		if ($msg) 
		{
		    $this->message = $msg;
		}
		else
		{
			$this->message = 'Something bad happened.';
		}
	}

	protected function getPageTitle() {
		return 'Error Page';
	}
	
	protected function getPageContent() {
        return "<p>{$this->message}</p><p><a href=index.php>Back to book list</a></p>";
	}	
}
?>
