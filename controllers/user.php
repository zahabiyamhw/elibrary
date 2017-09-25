<?php


class UserController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        //create the model object
        require("models/user.php");
        $this->model = new UserModel();
    }
    
    //default method
    protected function signup()
    {
        $this->view->output($this->model->signup());
    }

    protected function signupconfirm(){
        require("Database/user.php");
        /*Accepting data and sending to database*/
        try{
            $usr = new user();
            $usr->Fname = $_POST["Fname"];
            $usr->Lname = $_POST["Lname"];
            $usr->mobile = $_POST["mobile"];
            $usr->userid = $_POST["id"];
            $usr->passw = $_POST["pwd"];
            /*Searching for the mobile number in database*/
            if(strlen($usr->mobile)==10){
            $conn = connection();
           // $query = 'SELECT * FROM `user` WHERE `user_mobile` LIKE '.$usr->mobile.' OR `user_id LIKE` "'.$usr->userid.'" ';
           // $res = mysqli_query($conn,$query);
           /* if(mysqli_num_rows($res)>0){
                    echo "Sorry ! this phone number already exists in our database";
            }
            else{
               // echo $usr->Fname;
                //echo $usr->Lname;
               // echo $usr->mobile;
                //echo $usr->userid;
             */$usr->cookie= md5($usr->userid);
                //echo $usr->cookie
               $res = $usr->insert_user($usr);
               echo $res;
            }

        
        else{
            echo "";
        }
      }
        catch(exception $e){
            echo "Failed !, please try again";
        }
    
        

    }
    protected function display()
    {
        $this->view->output($this->model->display());
    }
    
    protected function signchk(){
       require("Database/user.php");
       $username = $_POST["username"];
       $password =$_POST["pwd"];
      
       $usr = new user();
       $row= $usr->searchuser($username, $password);
       if($password == strval($row["user_pass"])){
           
               $data = array(
                   'name' => $row["user_Fname"]." ".$row["user_Lname"],
                   'user' => $row["user_cookie"],
                   'cart' => $row["user_cart"]
               );
               echo json_encode($data);
               flush();
       }    
       else{
           echo "failed";
       }
    }
    

    protected function behaviour(){
        $cookie = $_POST["user"];
        try{require("Database/book.php");
            $conn = connection();
            if($cookie!="-1"){
                
                    $query ='SELECT `book_id`,COUNT(book_id) FROM `behavior` WHERE `user_cookie`= "'.$cookie.'" GROUP BY `book_id` ORDER BY COUNT(book_id) DESC';

                    $bk = new book();
                    $res = mysqli_query($conn, $query);

                    $rows = mysqli_fetch_all($res,MYSQLI_ASSOC);
                    $q2 = 'SELECT * FROM `book` WHERE ';
                    foreach($rows as $row){
                        $q2 .= ' `book_id` = '.$row["book_id"].' OR ';
                    }
                    //echo $q2."</br>";
                    $q2.= '`book_id`=1 GROUP BY `book_category` ORDER BY COUNT(book_category) DESC';
                    $res3 = mysqli_query($conn, $q2);
                    $resu = mysqli_fetch_all($res3,MYSQLI_ASSOC);
                    $data;
                    foreach($resu as $rd){
                      //  echo $rd["book_category"];
                        $q3='SELECT * FROM  `book` WHERE `book_category` = "'.$rd["book_category"].'" ORDER BY `book_totviews` DESC LIMIT 3';
                        $r3 = mysqli_query($conn, $q3);
                        $rest3 =mysqli_fetch_all($r3,MYSQLI_ASSOC);
                        foreach($rest3 as $rq3){
                         $data[]= array(
                                'name'=>trim($rq3["book_name"],"/"),
                                'id'=>$rq3["book_id"],
                                'price'=>$rq3["book_price"],
                                'category'=>$rq3["book_category"] 
                             );
                        }
                    }
                    echo json_encode($data);

                                flush();


            }
            else{
                $query = 'SELECT * FROM `book` ORDER BY `book_totviews` DESC LIMIT 10'; 
                $result = mysqli_query($conn, $query);
                 $arr = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $data = array();
  
                foreach($arr as $a){
               
                    $data[] =array(
                         'name' =>trim($a["book_name"],"/"),
                        'id' => $a["book_id"],
                        'price' => $a["book_price"],
                        'category'=>$a["book_category"] 
                    );
                }
                echo json_encode($data);
                flush();
             }
        }
        catch(Exception $e){
            echo "error reading behaviour";
        }
        mysqli_close($conn);
    }
}

?>