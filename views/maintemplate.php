

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>elibrary</title>
  
  <!-- mystyle css -->
  
  
  <!-- bootstrap includes--><!-- jquery includes-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  
  
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>
    <?php require("cooki.js");?>
</script>
<style>
  #search { 
      width: 25em;
  }
 </style>
<title><?php echo $viewModel->get('pageTitle'); ?></title>

</head>
<body>
   
    <div class="container-fluid header-back">
    <!-- header -->
    <div class="container">
    <div class="row">
       <div class="col-sm-2"> 
        <div>
            <h3><a href="http://localhost:8080/Nathan-MVC-master/">e-Library</a></h3>
        </div>  
       </div>
        <div class="col-sm-4">
              <!-- search box-->
               <div class="ui-widget">
                   <form action="" method="post" class="searchform"> 
                 
               <!--label for="search">search: </label-->
               <input type="text" class="form-control" placeholder="search" id="searchAutocomplete" autocomplete="off" class="ui-autocomplete-input" />
               </form>
               <!-- search box end-->
               </div>
               <!-- Cart display-->
             </div>
        <div class='col-sm-6'>
        <div class="customer-details">
            <div class='row'>
              <!--login -->
                  <form id="lform" class="form-group" method="POST">
                   <div class="col-sm-3">
                       username:        
                       <input type="text" class="form-control input-sm" name="username" style="width:100px;" ></input>
                   </div>
                      <div class="col-sm-3">
                      password:
                      <input type="password" class="form-control input-sm" name="pwd" style="width:100px;"></input>
                      
                      </div>
                  <!--login end-->
                <div class="col-sm-3 login">
                    <button type="submit" class="btn-sm btn-success" id="lbutton">Sign in</button>
                </div>
            </form>
                  
                  <div class="col-sm-9" align=""  id="logout">
                      <button type="button" class="btn-sm btn-danger">logout</button>
                  </div>
                  <div class="col-sm-3">
                      <p>cart:<span id="cartvalue"></span></p>
                  </div>

            </div>
            </div>
        </div>
        </div>
    </div><!--container-->
    </div><!--container-fluid-->

    <!-- header container finishes here -->
<script>
            //document ready handlers
$(document).ready(function(){
       // <!--Autocomplete javascript-->
        $("#searchAutocomplete").autocomplete({
		 source:function (request, response) {
			$.post("http://localhost:8080/Nathan-MVC-master/book/getquery", request, response,'json');
                       
	},
		 minLength:2,
		 html:true,
		 select: function(event,ui){
			 window.location.href="http://localhost:8080/Nathan-MVC-master/book/display/"+ui.item.name;
		 }
	 });
     });
         
</script>

<!-- main body -->

<div class="container">
<?php require($this->viewFile); ?>
    </div>
    
 
<script>    
 //login check
var cooki = document.cookie;
if(cooki!=''){
   
    var vals = cooki.split(";");
    var userfname = vals[0].split("=");
    var usercooki = vals[1].split("=");
    if(usercooki[1]!=''||userfname[1]!=''){
        console.log("logged in");
        //hiding the lform and displaying the logout button
        $("#lform").hide();
        //document.getElementById("login").innerHTML = "logged in";
        $("#logout").show();
       
       //setting cart values 
       
       $.ajax({
           type:"post",
           url:"http://localhost:8080/Nathan-MVC-master/cart/getCartValue",
           data:{
               'user': getuser()
           },
           success: function(response){
               
               document.getElementById("cartvalue").innerHTML = response;
               
           }
       })
        
        
       }
        else{
        
    //showing the lform
        $("#logout").hide();
       document.getElementById("cartvalue").innerHTML = 0;
    }
}
else{    
    
   //showing the lform
    $("#logout").hide();
}


//document ready handlers
$(document).ready(function(){
        //Authentication 
         $("#lbutton").on("click",function(){
            
            event.preventDefault();
            $.ajax({
                type:"post",
                url:"http://localhost:8080/Nathan-MVC-master/user/signchk",
                data:$("#lform").serialize(),
                success:function(response){
                    
                    
                    //values = response.split("/");
                    if(response!=="failed"){
                       var k = JSON.parse(response);
                        console.log("response is "+k);
                        console.log(k.name);
                        $("#lform").hide();     
                         document.cookie="user="+k.user+";path=/";
                        document.cookie="name="+k.name+";path=/";
                        
                    $("#logout").show();
                    window.location.href="http://localhost:8080/Nathan-MVC-master/";
                    
                }
                  else{
                        document.getElementById("login").innerHTML = "Sorry incorrect credentials";
                    }
                }
            })
         });
     
        //logout
         $("#logout").on("click",function(){
             event.preventDefault();
             document.cookie="user=;path=/";
             document.cookie="name=;path=/";
             console.log("logged out");
             window.location.href="http://localhost:8080/Nathan-MVC-master/";
         });
 });
</script>
<!-- my stylesheet-->
  <style>
      <?php require __DIR__.'\mystyle.css'; ?>
   </style>
<div class="container-fluid header-back">
    <div class="container">
        <footer>
            
            <div class="row">
                <div class="col-sm-3">

                            <div class="copyrights">
                            Copyright © .Designed and developed by Rohan Aswani and Zahabiya Mhowwala
                            </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <div class="row">
                        <h3>Follow us on :</h3>
                    </div>
                    <div class="row ">
                        <div class="col-sm-4">
                            <i class="fa fa-facebook fa-3x"></i>
                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-twitter fa-3x"></i>
                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-instagram fa-3x"></i>
                        </div>
                    </div>
                       
                </div>
                <div class="col-sm-2 ">
                <h3>Book</h3>
                <div class =" row clr">
                    <a href="http://localhost:8080/Nathan-MVC-master/book/insert">Insert</a>
                </div>
                <div class =" row clr">
                    <a href="http://localhost:8080/Nathan-MVC-master/book/edit">Edit</a>
                </div>
                <div class =" row clr">
                    <a href="http://localhost:8080/Nathan-MVC-master/book/displayall">Show All</a>
                </div>
                </div>
                <div class="col-sm-2 ">
                <h3>User</h3>
                    <div class =" row clr">
                    <a href="http://localhost:8080/Nathan-MVC-master/user/signup">Signup</a>
                </div>
                </div>
                <div class="col-sm-2">
                <h3>Cart</h3>
                <div class =" row clr">
                    <a href="http://localhost:8080/Nathan-MVC-master/cart/display">Display</a>
                </div>
                </div>
        
            </div>
</div><!--row-->
</footer>
</br>
</br>