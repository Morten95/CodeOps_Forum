<?php
//include("model/DBModel.php");
//Skal egentlig legges inn i DBmodel.php, men dette er en egen php side
			$search_keyword = $_POST["Search"];

$table_ass_array = array(
			'Topic' => array( 		 // Search in Topics
						'title',			   // Column Name title to search in
						'body'			     // Column body to search in
						),
			'Post' => array(			 // Search in Posts
						'body'			     // Column body to search in
            ),
      'Comment' => array(		 // Search in Comments
						'body'			     // Column body to search in
						)
			);
			php_search_all_database($search_keyword,$table_ass_array);

function php_search_all_database($search_keyword,$table_ass_array){

	global $conn;

	$db_hostname = 'localhost'; 				      // database hostname
	$db_username = 'root'; 				            // database username
	$db_password = ''; 				                // database password
	$db_database_name = 'CodeOps_database'; 	// database name

	$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database_name);

		if(mysqli_connect_errno()){		// Check connection
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$rt = $table_ass_array;
		echo "<b>Given Keyword :</b> ".$search_keyword . '<br>';


		if(count($rt) > 0){ 							// check weather table column is not empty
			foreach($rt as $k=>$v){ 						// iterate column name table
				$table = $k;
				//print_r ($v);   //var "echo $v"
				foreach($v as $r2){	// fetch data from respective column name

					$colum = $r2;	//[0];

//$rs3 = searchDB($colum,$table,$search_keyword); //Denne jeg burde bruke??
					$sql_search_fields = $colum . " LIKE ('%" . $search_keyword . "%')";
					$sql_search = "SELECT * FROM " . $table . " WHERE " . $sql_search_fields;
					$rs3 = $conn->query($sql_search);


					if($rs3->num_rows > 0){ 				// check weather 'keyword' found or not

						echo "<u>Found in: " . $table . 's</u>';
						while($r3 = $rs3->fetch_array()){ 	// fetch result from respective data
							//$count++;
							//$pstid = $r3['postID'];
							echo "<li> Column Name : " . $colum . "</li>";
							echo "<li> Main ID  : " . $r3['id'] . "</li>";	// Noe vits?
							if (array_key_exists("postID", $r3)) {
								echo "<li> PostID : " . $r3['postID'] . "</li>";
							}
							if (array_key_exists("topicId", $r3)) {
								echo "<li> TopicID : " . $r3['topicId'] . "</li>";
							}
							echo "<li> Value : " . $r3[$colum] . "</li><br>";


						}	// while loop close

					}	else {
							echo " Nothing found in " . $colum . "<br>";
					}


				}	//foreach close

				echo $table." Searching End's Here<hr>";

			}	//foreach close

		}	// Table count close
}
