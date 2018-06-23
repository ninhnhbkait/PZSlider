<?php
class UsersController extends AppController{
    public $name = "Users";
    
    function index(){
        $data = $this->User->find("all");
        $this->set("data",$data);
    }    
}    