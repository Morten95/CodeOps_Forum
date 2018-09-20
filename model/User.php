<?php 

	/**
	 * 
	 */
	class User
	{	
		public $id;
		public $username;
		public $password;
		public $email;
		public $fname;
		public $lname;
		public $active = null;
		public $admin  = null;

		function __construct($id = -1, $username,$password,$email,$fname,$lname,$active, $admin)
		{
			
			$this->id = $id;
			$this->username = $username;
			$this->password = $password;
			$this->email    = $email;
			$this->fname    = $fname;
			$this->lname    = $lname;
			$this->active   = $active;
			$this->admin    = $admin;

		}

		function setUserData($id, $email, $fname, $lname, $active, $admin){
			$this->id    = $id;
			$this->email    = $email;
			$this->fname    = $fname;
			$this->lname    = $lname;
			$this->active   = $active;
			$this->admin    = $admin;
		}

		
	}

?>