<?php
	function connection(){
		$server = "localhost";
		$user = "root";
		$pwd = "";
		$dbname= "elibrary";

		$conn = mysqli_connect($server , $user, $pwd, $dbname);
		return($conn);

	}

	class behavior{
		public $s_no, $id, $cookie;

		function get_behavior($id){
			$conn = connection();

			if($conn){
				$query="SELECT * FROM `behavior` WHERE `book_id` = '".$id."' " ;
				$result=mysqli_query($conn, $query);
				$num = mysqli_num_rows($result);
				$row = mysqli_fetch_assoc($result);
				
			}
			return ($row);
		}

		function getall_behavior(){
			$conn = connection();

			if($conn){
				$query = "SELECT * FROM `behavior` WHERE 1" ;
				$result = mysqli_query($conn, $query);
				$num = mysqli_num_rows($result);
				$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

			}
			return ($rows);	
		}

		function insert_behavior($obj){
			$conn = connection();

			if($conn){
				$query="INSERT INTO `behavior`(`s_no`, `user_cookie`, `book_id`) VALUES ('".$obj->s_no."', '".$obj->cookie."', '".$obj->id."') " ;
				$result=mysqli_query($conn, $query);
				if ($result){
					return ("Insertion Successful.");
				}
				else{
					return ("Insertion Unsuccessful.");
				}
			}

		}
	}


	/*
	//get function
	$Behavior = new behavior;
	$temp = new behavior;
	$row=$behavior->get_behavior("1234");
	echo "Book ID: " . $row["book_id"] ."<br> Cookie: " . $row["user_cookie"] . "<br> ";
	echo "<br>";

	//Getall function
	$rows = $Behavior->getall_behavior();
	foreach ($rows as $row) {
		echo $row['book_id']."</br>";
	}

	//Insert function
	$temp->id = '1234';
	$message = $Behavior->insert_behavior($temp);
	echo $message; 
	*/
?>