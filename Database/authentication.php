<?php
	function connection(){
		$server = "localhost";
		$user = "root";
		$pwd = "";
		$dbname= "elibrary";

		$conn = mysqli_connect($server , $user, $pwd, $dbname);
		return($conn);

	}

	class authentication{
		public $s_no, $id, $cookie, $time;

		function get_cookie($id){
			$conn = connection();

			if($conn){
				$query="SELECT * FROM `authentication` WHERE `user_id` = '".$id."' " ;
				$result=mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				
			}
			return ($row);
		}

		function getall_cookie(){
			$conn = connection();

			if($conn){
				$query = "SELECT * FROM `authentication` WHERE 1" ;
				$result = mysqli_query($conn, $query);
				$num = mysqli_num_rows($result);
				$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

			}
			return ($rows);	
		}

		function update_time($id, $obj){
			$conn = connection();

			if($conn){
				$query = "UPDATE `authentication`  SET /*`s_no`=[value-1],`user_id`=[value-2],`user_cookie`=[value-3],*/ `time`= '".$obj->time."' WHERE `user_id` = '".$id."' " ;
				$result=mysqli_query($conn, $query);
				if ($result){
					return ("Update Successful.");
				}
				else{
					return ("Update Unsuccessful.");
				}
			}

		}

		function insert_cookie($obj){
			$conn = connection();

			if($conn){
				$query="INSERT INTO `authentication`(`s_no`, `user_id`, `user_cookie`, `time`) VALUES ('".$obj->s_no."', '".$obj->id."', '".$obj->cookie."', '".$obj->time."') " ;
				$result=mysqli_query($conn, $query);
				if ($result){
					return ("Insertion Successful.");
				}
				else{
					return ("Insertion Unsuccessful.");
				}
			}

		}

		function delete_cookie($id){
			$conn = connection();

			if($conn){
				$query="DELETE FROM `authentication` WHERE `user_id` = '".$id."' " ;
				$result=mysqli_query($conn, $query);
				if ($result){
					return ("Deletion Successful.");
				}
				else{
					return ("Deletion Unsuccessful.");
				}
			}


		}
	}

	/*
	//get function
	$auth = new authentication;
	$temp = new authentication;
	$row=$auth->get_cookie("1234");
	echo "User ID: " . $row["user_id"] ."<br> Cookie: " . $row["user_cookie"] . "<br> ";
	echo "<br>";

	//Getall function
	$rows = $auth->getall_cookie();
	foreach ($rows as $row) {
		echo $row['user_id']."</br>";
	}

	//Insert function
	$temp->id = '12345';
	$message = $auth->insert_cookie($temp);
	echo $message; 

	//Update function
	$temp->id = '123456';
	$temp->time = '0000-00-00 12:00:00';
	$message = $auth->update_time($temp->id, $temp);
	echo $message;
	echo "<br>";

	//Delete function
	$message = $auth->delete_cookie('12345');
	echo $message;
	echo "</br>";
	*/
?>