<?php

class UserModel extends BaseModel
{
    //data passed to the home index view
    public $cookie="";
    public function signup()
    {   
        return $this->viewModel;
    }
    public function signupconfirm(){

    	return $this->viewModel;
    }
    public function display(){
        
    }
}

?>
