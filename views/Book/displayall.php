
<script>

function deleted(x){
    console.log("delete id :"+x);
    $.ajax({
        type:"post",
        url:"http://localhost:8080/Nathan-MVC-master/book/delete/",
        data:{
            'id': x
        },
        success:function(response){
               console.log(response);
        }
       })
}        
</script>

<div class="row border">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-2 ">
        <p>Book Name</p>
    </div>
    <div class="col-sm-2 ">
        <p>Book Publisher</p>
    </div>
    <div class="col-sm-1">
        <p>Author</p>
    </div>
    <div class="col-sm-1 ">
        <p>Book platform</p>
    </div>
    <div class="col-sm-1">
        <p>Book Year</p>
    </div>
    <div class="col-sm-1">
        <p>Book Price</p>
    </div>
    <div class="col-sm-1">
        <p>Book Quantity</p>
    </div>
    
    <div class="col-sm-1">
        <p>Book Total Views</p>
    </div>
    <div class="col-sm-1">
        
    </div>
</div><!--row-->
</br>
</br>
<?php
$all_books = $viewModel->get('all_book');

foreach($all_books as $row){
?>
<div class="row border">
    <div class="col-sm-1">
        <a href="http://localhost:8080/Nathan-MVC-master/book/edit/<?php echo $row["book_id"]?>">edit</a>
    </div>
    <div class="col-sm-2">
        <p><?php echo trim($row["book_name"],"/")?></p>
    </div>
    <div class="col-sm-2">
        <p><?php echo $row["book_publisher"]?></p>
    </div>
    <div class="col-sm-1">
        <p><?php echo $row["book_author"]?></p>
    </div>
    <div class="col-sm-1">
        <p><?php echo $row["book_platform"]?></p>
    </div>
    <div class="col-sm-1">
        <p><?php echo $row["book_year"]?></p>
    </div>
    <div class="col-sm-1">
        <p><?php echo $row["book_price"]?></p>
    </div>
    <div class="col-sm-1">
        <p><?php echo $row["book_qty"]?></p>
    </div>
    <div class="col-sm-1">
        <p><?php echo $row["book_totviews"]?></p>
    </div>
    <div class="col-sm-1">
        <span id="<?php echo $row["book_id"]?>" onclick="deleted(<?php echo $row["book_id"]?>)"> <p><i class="fa fa-times">Delete</i></p></span>
    </div>
</div><!--row-->
</br>
<?php } ?>


