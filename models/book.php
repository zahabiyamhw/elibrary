<?php
require("Database/book.php");
class BookModel extends BaseModel
{
	
	public $id=0;
    //data passed to the home index view
    public function index()
    {   
        $this->viewModel->set("pageTitle","Welcome to the book view");
        return $this->viewModel;
    }
	public function display()
	{
            
                if($this->id!=0){
                    $conn = connection();
                    $query = 'UPDATE `book` SET `book_totviews` = `book_totviews`+1 WHERE `book_id`='.  $this->id.' ';
                    $res = mysqli_query($conn, $query);
                    if($res){
                       
                        // successfull
                    }
                }
		//echo "I am here ";
		$book = new book();
		//echo "I am here ";
		$row = $book->get_Book($this->id);
                $this->viewModel->set("book_id",$row["book_id"]);
		$this->viewModel->set("book_name",trim($row["book_name"],"/"));
		$this->viewModel->set("book_author",$row["book_author"]);
		$this->viewModel->set("book_publisher",$row["book_publisher"]);
		$this->viewModel->set("book_platform",$row["book_platform"]);
		$this->viewModel->set("book_subject",$row["book_subject"]);
		$this->viewModel->set("book_year",$row["book_year"]);
                $this->viewModel->set("book_price",$row["book_price"]);
                $this->viewModel->set("book_category",$row["book_category"]);
		return $this->viewModel;
	}
        
        public function insert(){
            
		//echo "I am here ";
		$book = new book();
		//echo "I am here ";
		$row = $book->get_Book($this->id);
                $this->viewModel->set("book_id",$row["book_id"]);
		$this->viewModel->set("book_name",trim($row["book_name"],"/"));
		$this->viewModel->set("book_author",$row["book_author"]);
		$this->viewModel->set("book_publisher",$row["book_publisher"]);
		$this->viewModel->set("book_platform",$row["book_platform"]);
		$this->viewModel->set("book_subject",$row["book_subject"]);
		$this->viewModel->set("book_year",$row["book_year"]);
                $this->viewModel->set("book_price",$row["book_price"]);
                $this->viewModel->set("book_qty",$row["book_qty"]);
            return $this->viewModel;
        }
        
        public function edit(){
            
		//echo "I am here ";
		$book = new book();
		//echo "I am here ";
		$row = $book->get_Book($this->id);
                $this->viewModel->set("book_id",$row["book_id"]);
		$this->viewModel->set("book_name",trim($row["book_name"],"/"));
		$this->viewModel->set("book_author",$row["book_author"]);
		$this->viewModel->set("book_publisher",$row["book_publisher"]);
		$this->viewModel->set("book_platform",$row["book_platform"]);
		$this->viewModel->set("book_subject",$row["book_subject"]);
		$this->viewModel->set("book_year",$row["book_year"]);
                $this->viewModel->set("book_price",$row["book_price"]);
                $this->viewModel->set("book_qty",$row["book_qty"]);
            return $this->viewModel;
        }
        
        public function displayall(){
            
            $book = new book();
                
            $rows = $book->getall_book();
            $this->viewModel->set("all_book",$rows);
            return $this->viewModel;
        }
}

?>
