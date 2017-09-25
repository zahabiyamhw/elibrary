<?php

class EditController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        //create the model object
        require("models/cart.php");
        $this->model = new CartModel();
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }

    protected function bookdisplay(){
       
      
    }
    
    protected function userdisplay(){
        
    }
}