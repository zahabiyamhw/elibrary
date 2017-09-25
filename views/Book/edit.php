</br>
<form method="post" action="">
<h2>Edit Book</h2>
<div class="row">
    <div class="col-sm-2">
    <label>Name : </label>
    </div>
    <div class="col-sm-3">
        <input  type="text" name="book_name" class="form-control" value="<?php echo $viewModel->get('book_name')?>"></input>
</div>
    </div>
</br>
<div class="row">
    <div class="col-sm-2">
<label>Author : </label>
</div>
<div class="col-sm-3">
    <input class="form-control" type="text" name="book_author" value="<?php echo $viewModel->get('book_author')?>"></input>
</div>
</div>
</br>
<div class="row">
    <div class="col-sm-2">
<label>Publisher : </label>
</div>
<div class="col-sm-3">
<input class="form-control" type="text" name="book_publisher" value="<?php echo $viewModel->get('book_publisher')?>"></input>
</div>
</div>
</br>
<div class="row">
    <div class="col-sm-2">
<label>Year : </label>
</div>
<div class="col-sm-3">
    <input type="text" class="form-control" name="book_year" value="<?php echo $viewModel->get('book_year')?>"></input>
</div>
</div>
</br>
<div class="row">
    <div class="col-sm-2">
<label>Subject : </label>
</div>
<div class="col-sm-3">
    <input type="text" name="book_subject" class="form-control" value="<?php echo $viewModel->get('book_subject')?>"></input>

</div></div>
</br>
<div class="row">
    <div class="col-sm-2">
<label>Platform :</label>
</div>
<div class="col-sm-3">
<input type="text" name="book_platform" class="form-control" value="<?php echo $viewModel->get('book_platform')?>"></input>
</div>
</div>
</br>

<div class="row">
    <div class="col-sm-2">
<label>Price :</label>
</div>
<div class="col-sm-3">
<input type="text" name="book_price" class="form-control" value="<?php echo $viewModel->get('book_price')?>"  ></input>
</div>
</div>

</br>

<div class="row">
    <div class="col-sm-2">
<label>Quantity :</label>
</div>
<div class="col-sm-3">
<input type="text" name="book_price" class="form-control" value="<?php echo $viewModel->get('book_qty')?>"  ></input>
</div>
</div>
<button type="submit" class="btn-sm btn-warning" id="edit">Edit</button>
</br>
</br>
</form>