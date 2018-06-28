<?php
  class TesthelpersController extends AppController{
    public $helpers = array('Lib');//sử dụng helper Lib
    function test(){
      $this->render("test"); // load file view test.ctp
    }
  }