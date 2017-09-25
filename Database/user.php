<?php
	function connection(){
		$server = "localhost";
		$user = "root";
		$pwd = "";
		$dbname= "elibrary";

		$conn = mysqli_connect($server , $user, $pwd, $dbname);
		return($conn);

	}

	class user{
		public $id=0,$userid, $Fname=0, $Lname=0, $mobile=0, $cookie="",$passw="";
                
                public function searchuser($username,$password){
                    
                    $conn = connection();
                    
                    if($conn){
                        $query = 'SELECT * FROM `user` WHERE `user_id` = "'.$username.'" ';
                        	$result=mysqli_query($conn, $query);                                   
				$row = mysqli_fetch_assoc($result);
                                
                    }
                    return($row); 
                    
                }

		public function get_user($id){
			$conn = connection();

			if($conn){
				$query="SELECT * FROM `user` WHERE `user_id` = '".$id."' " ;
				$result=mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				
			}
			return ($row);
		}	

		public function getall_user(){
			$conn = connection();

			if($conn){
				$query = "SELECT * FROM `user` WHERE 1" ;
				$result = mysqli_query($conn, $query);
				$num = mysqli_num_rows($result);
				$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

			}
			return ($rows);	
		}


		public function update_user($userid, $obj){
			$conn = connection();

			if($conn){
				$query="UPDATE `user` SET `user_id`= '".$obj->id."' , `user_Fname` = '".$obj->Fname."' WHERE `user_id` = '".$userid."' " ;
				$result=mysqli_query($conn, $query);
				if ($result){
					return ("Update Successful.");
				}
				else{
					return ("Update Unsuccessful.");
				}
			}

		}

		public function insert_user($obj){
			$conn = connection();

			if($conn){
                            
                                //$query2 = 'CREATE TABLE `elibrary`.`'.$obj->cookie.'` ( `sno` INT NOT NULL AUTO_INCREMENT, `book_id` INT NOT NULL ,`count` INT NOT NULL, PRIMARY KEY(`sno`)) ENGINE = InnoDB;';
                                $query2 = 'INSERT INTO `user`( `user_id`, `user_Fname`, `user_Lname`, `user_mobile`, `user_cookie`, `user_pass`) VALUES ("'.$obj->userid.'","'.$obj->Fname.'","'.$obj->Lname.'","'.$obj->mobile.'","'.$obj->cookie.'","'.$obj->passw.'")';  
                                $result2=mysqli_query($conn,$query2);
				
                                if ($result2){
                                        return ("Insertion Successful.");
				}
				else{
					return ("Insertion Unsuccessful.");
				}
			}

		}

		function delete_user($id){
			$conn = connection();

			if($conn){
				$selectQuery="SELECT * FROM `user` WHERE  `user_id` = '".$id."' ";
				$selectResult=mysqli_query($conn, $selectQuery);
				$num=mysqli_num_rows($selectResult);
				if($num>"0")
				{
					$query="DELETE FROM `user` WHERE `user_id` = ".$id." " ;
					$result=mysqli_query($conn, $query);
					if ($result){
						return ("Deletion Successful.");
					}
					else{
						return ("Deletion Unsuccessful.");
					}
				}
				else
				{
					return ("User ID does not exist.");
				}
			}
		}
	}

?>
