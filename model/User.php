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

		function __construct($username,$password,$email,$fname,$lname,$active, $admin)
		{
			
			$this->username = $username;
			$this->password = $password;
			$this->email    = $email;
			$this->fname    = $fname;
			$this->lname    = $lname;
			$this->active   = $active;
			$this->admin    = $admin;

		}

		function setUserData($email, $fname, $lname, $active, $admin){
			$this->email    = $email;
			$this->fname    = $fname;
			$this->lname    = $lname;
			$this->active   = $active;
			$this->admin    = $admin;
		}

		
	}

?>