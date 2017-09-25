
<form method="POST" action="#" id="signup">
	<h2>SIGN UP</h2><br>
	<div class='row'>
            <div class='col-sm-2'>  User ID: </div> 
            <div class='col-sm-3'><input type="text" class="form-control" name="id"> </input></div>
        </div>
        </br>
        <div class='row'>
            <div class='col-sm-2'> First Name: </div> 
            <div class='col-sm-3'><input type="text" class="form-control" name="Fname"> </input></div>
        </div>
        </br>
        
        <div class='row'>
           
            <div class='col-sm-2'>Last Name:</div> 
            <div class='col-sm-3'><input type="text" name="Lname" class="form-control"> </input></div>
        </div>
        </br>
        
        <div class='row'>
            <div class='col-sm-2'>Mobile Number:</div> 
            <div class='col-sm-3'><input type="text" name="mobile" class="form-control" min="10" max="10"> </input></div>
        </div>
        <br>
        
        <div class="row">
            <div class='col-sm-2'>Password:</div>
            <div class='col-sm-3'><input type="password" name="pwd" class="form-control"></input></div>
        </div>
        <button type="submit" id="submit" class="btn-sm btn-success">Submit</button>
</form>
<p id="status"></p>
<script>
    $('#submit').on("click",function(){
            $.ajax({
                type:"post",
                url:"http://localhost:8080/Nathan-MVC-master/user/signupconfirm",
                data:$('#signup').serialize(),
                success: function(response){
                    document.getElementById("status").innerHTML = response;
                }
            })
        }); 

    
 </script>