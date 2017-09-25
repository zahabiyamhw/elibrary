<?php
require_once 'Database/Book.php';
class CartModel extends BaseModel
{
    //data passed to the home index view
    public $cookie="";
    public function index()
    {   
        $this->viewModel->set("pageTitle","CartModel");
        return $this->viewModel;
    }
    public function display(){
       return $this->viewModel;
    }
    
}
