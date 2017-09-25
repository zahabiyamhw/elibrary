<script>
    <?php require("cooki.js");?>
</script>
<div class="row">
    <div class="col-sm-5 imgpadd">
    <img src="http://localhost:8080/images/(<?php echo $viewModel->get('book_id');?>).jpg" width="400" height="400"></img>
    </div>
    <div class="col-sm-6">
    <h2 ><?php echo $viewModel->get('book_name'); ?></h2>
<p id ="bookid"><?php echo $viewModel->get('book_id');?></p>
<p>Author: <?php echo $viewModel->get('book_author');?></p>
<p>Publisher:<?php echo $viewModel->get('book_publisher'); ?></p>
<p>Year: <?php echo $viewModel->get('book_year'); ?></p>
<p>Subject: <?php echo $viewModel->get('book_subject');?></p>
<p>Platform: <?php echo $viewModel->get('book_platform');?></p>
<p>Price:"<?php echo $viewModel->get('book_price');?></p>
<p>Category:"<?php echo $viewModel->get('book_category');?></p>
<p id="status"></p>
<input type="number" value="1" id="count"></input></br></br>
<button id="Cart" class="btn-lg" name="<?php echo $viewModel->get('book_id')?>">Add to cart</button>
<button id="Buy" class="btn-lg" name="<?php echo $viewModel->get('book_id')?>">Buy now</button>
    </div>
 </div>
<script>
   
   
$(document).ready(function(){
    $("#Cart").on("click",function(){
        
        var id= document.getElementById("Cart").name;
       $.ajax({
        type:"post",
        url:"http://localhost:8080/Nathan-MVC-master/cart/add",
        data:{
            'id': id,
            'user': getuser(),
            'count': document.getElementById("count").value
        },
        success:function(response){
               document.getElementById("status").innerHTML= response;
        }
       }) 
        
        
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
        
    });
    $("#Buy").on("click",function(){
        
    });
    
    
    
    $.ajax({
        type:"post",
        url:"http://localhost:8080/Nathan-MVC-master/book/behaviour",
        data:{
            'id' : document.getElementById("bookid").innerHTML,
            'user': getuser()
        },
        success:function(response){
               console.log(response);
        }
       })
    
    
});
</script>
</br></br>