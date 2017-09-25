<?php
	function connection(){
		$server = "localhost";
		$user = "root";
		$pwd = "";
		$dbname= "elibrary";

		$conn = mysqli_connect($server , $user, $pwd, $dbname);
		return($conn);

	}

	class book{
		public $id=0, $name=0,$subject="", $publisher="", $author="", $qty=0, $price=0, $totviews=0,$year=0,$platform="";
               

		function get_book($id=2){
			$conn = connection();

			if($conn){
				$query="SELECT * FROM `book` WHERE `book_id` = ".$id." " ;
				$result= mysqli_query($conn,$query);
				$row = mysqli_fetch_assoc($result);
				
			}
			
			return ($row);
		}	

		function getall_book(){
			$conn = connection();

			if($conn){
				$query = "SELECT * FROM `book` WHERE 1" ;
				$result = mysqli_query($conn, $query);
				$num = mysqli_num_rows($result);
				$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

			}
			return ($rows);	
		}

		function update_book($obj){
			$conn = connection();

			if($conn){
				$query='UPDATE `book` SET  `book_name` = "'.$obj->name.'", `book_publisher`= "'.$obj->publisher.'", `book_author`= "'.$obj->author.'", `book_qty`= "'.$obj->qty.'", `book_price`= "'.$obj->price.'" ,`book_platform` = "'.$obj->platform.'" , `book_year`='.$obj->year.' , `book_subject` = "'.$obj->subject.'" WHERE `book_id` = '.$obj->id.' ';				
                                $result=mysqli_query($conn, $query);
				if ($result){
					return ("Update Successful.");
				}
				else{
					return ("Update Unsuccessful.");
				}
			}

		}

		function insert_book($obj){
			$conn = connection();

			if($conn){				
				$query='INSERT INTO `book`( `book_name`, `book_platform`, `book_author`, `book_qty`, `book_price`, `book_totviews` , `book_subject`, `book_publisher` , `book_year` ) VALUES ( "'.$obj->name.'", "'.$obj->platform.'", "'.$obj->author.'", '.$obj->qty.', '.$obj->price.', '.$obj->totviews.', "'.$obj->subject.'" , "'.$obj->publisher.'" , "'.$obj->year.'")' ;
				$result=mysqli_query($conn, $query);
				if ($result){
					return ("Insertion Successful.");
				}
				else{
					return ("Insertion Unsuccessful.");
				}
			}

		}

		function delete_book($obj){
			$conn = connection();

			if($conn){
				$query="DELETE FROM `book` WHERE `book_id` = ".$obj->id." " ;
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
	
	
?>
