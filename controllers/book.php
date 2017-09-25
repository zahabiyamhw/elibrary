<?php
/* 
 * Project: Nathan MVC
 * File: /controllers/home.php
 * Purpose: controller for the home of the app.
 * Author: Nathan Davison
 */
class BookController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        //create the model object
		
        require("models/book.php");
        $this->model = new BookModel();
    
		foreach($urlValues as $url){
				if(is_numeric($url)){
					$this->model->id = intval($url);
				}
			}
		}

    protected function index()
    {
        $this->view->output($this->model->index());
    }
    
    protected function behaviour(){
        
        $book_id = $_POST["id"];
        $user = $_POST["user"];
        
        $conn = connection();
        $query = 'INSERT INTO `behavior` ( `user_cookie`, `book_id`) VALUES ( "'.$user.'", '.$book_id.' )';
        $result = mysqli_query($conn, $query);
       if($result){
           echo "successful";
       }else{
           echo "failed";
       }
        
    }
    protected function bookAdd(){
        require('Database\book.php');
	$temp = new book();
	
	$temp->name = $_POST["name"];
	$temp->isbn = $_POST["isbn"];
	$temp->author = $_POST["author"];
	$temp->qty = $_POST["qty"];
	$temp->price = $_POST["price"];
	$message = $temp->insert_book($temp);
	echo $message;
	
    }
    protected function insert(){
        
        $this->view->output($this->model->insert());
    }
    
    protected function bookEdit(){
        require('Database\book.php');
        $temp = new book();
	$temp->id = $_POST["id"];
	$temp->name = $_POST["name"];
	$temp->isbn = $_POST["isbn"];
	$temp->author = $_POST["author"];
	$temp->qty = $_POST["qty"];
	$temp->price = $_POST["price"];
	$message = $temp->insert_book($temp);
	echo $message;
    }

    protected function edit(){
        
        $this->view->output($this->model->edit());
    }
    protected function display(){
            
        
        $this->view->output($this->model->display());
    }
	
	protected function getquery(){
		
			
	$search = $_POST['term'];	
	$conn = connection();
	if($conn){

		$query = 'SELECT `book_name`,`book_totviews`,`book_buys`,`book_id` FROM `book` WHERE `book_name` LIKE "'.$search.'%" ORDER BY `book_totviews` DESC,`book_buys` DESC LIMIT 10';
		
		$result = mysqli_query($conn,$query);
		$arra = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$data = array();
		foreach($arra as $a){
		
		$data[]= array(
				'value' =>trim($a['book_name'],"/"),
				'name' => $a['book_id']
			);
		}
		echo json_encode($data);
		flush();
		
		
	
        }
        
        mysqli_close($conn);
		
	}
        
        protected function displayall(){
            
            $this->view->output($this->model->displayall());
        }
        
        protected function delete(){
            $book_id = $_POST["id"];
            
            $temp = new book();
            $temp->id = $book_id;
            
            $res = $temp->delete_book($temp);
         
            echo $res;
            
        }
}

?>
