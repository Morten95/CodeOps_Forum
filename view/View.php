<?php


Class View {
	public function create($filePath, $data) {
	       //including header file
	       include 'view/includes/header.php';
	       include $filePath;
	       include 'view/includes/footer.php';
	}
}
?>