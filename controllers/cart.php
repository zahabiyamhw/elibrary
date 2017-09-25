<?php
/* 
 * Project: Nathan MVC
 * File: /controllers/home.php
 * Purpose: controller for the home of the app.
 * Author: Nathan Davison
 */

require("Database/book.php");
class CartController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        //create the model object
        
        require("models/cart.php");
        $this->model = new CartModel();
        
        foreach($urlValues as $val){
            if(strlen($val)==32){
               $this->model->cookie = $val;
            }
            else{
                continue;
            }
        }
    }
    
    //default method
    protected function display()
    {
        $this->view->output($this->model->display());
    }

    protected function add(){
       $cookie = $_POST["user"];
       $book_id =$_POST["id"];
       $count = $_POST["count"];
      $conn = connection();
       if($cookie!='' && $book_id!='' && $count!=0){
        $query = ' INSERT INTO `cart` ( `book_id` , `count` , `user_cookie` ) VALUES ( "'.$book_id.'", "'.$count.'" , "'.$cookie.'") ';
       
       $result = mysqli_query($conn, $query);
       if($result){
           echo "successfully added to cart";
       }
       else{
           if($cookie==''){
               echo "please sign up to continue";
           }
           else if($count==0){
               echo "Please input a valid count";
           }
           else if($book_id==''){
               echo "not a valid book id";
           }
       }
      }
      else{
          echo "invalid operation";
      }
      mysqli_close($conn);
    }
    
    protected function getCartValue(){
        $cookie = $_POST["user"];
        if($cookie!=''){
            
            $query = 'SELECT COUNT(*) as total FROM `cart` WHERE user_cookie = "'.$cookie.'"';
            $conn = connection();
            
           
            if($conn){
                $result = mysqli_query($conn, $query);
                if($result){
                    $rset = mysqli_fetch_assoc($result);

                    echo $rset["total"];
                }
                else{
                    echo "error fetching results";
                }
            }
            else{
                echo "error in connection";
            }
        }
        
    }
    
    protected function getCartDetails(){
         $conn = connection();
         
         if($this->model->cookie!="" && $conn || $this->model->cookie!="-1"){
           
           $query = 'SELECT * FROM `cart` WHERE `user_cookie`= "'.$this->model->cookie.'" ';
           $result = mysqli_query($conn, $query);
          $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
          $data=array();
          foreach($rows as $row){
              $query ='SELECT * FROM `book` WHERE `book_id` = '.$row["book_id"].'';
              $rset = mysqli_query($conn, $query);
              $ftarry = mysqli_fetch_assoc($rset);
              $data[] = array(
                  'id' => $row["sno"],
                  'book_id' => $ftarry["book_id"],
                  'name' => trim($ftarry["book_name"],"/"),
                  'count' => $row["count"],
                  'amount' => $ftarry["book_price"]*$row["count"]
              ); 
          }
         echo json_encode($data);
         flush();
       }
       else{
           echo "failed";
       }
    }
}

?>
