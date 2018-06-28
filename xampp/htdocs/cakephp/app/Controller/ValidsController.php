<?php
class ValidsController extends AppController{
    public $name = "Valids";
    public $helpers = array('Html','Form');
    public $components = array('Session');
    
    
    function vidu1(){
        //print_r($this->data);
        $this->Valid->set($this->data);
        if($this->data){
            if($this->Valid->valid1()== TRUE){
                $this->Session->setFlash("Dữ liệu hợp lệ !");
            }else{
                $this->Session->setFlash("Dữ liệu không hợp lệ!");
            } 
        }        
    }
    
    function vidu2(){
        $this->Valid->set($this->data);
        if($this->data){
            if($this->Valid->valid2()== TRUE){
                $this->Session->setFlash("Dữ liệu hợp lệ !");
            }else{
                $this->Session->setFlash("Dữ liệu không hợp lệ!");
            } 
        }        
    }
    function vidu3(){
        $this->Valid->set($this->data);
        if($this->data){
            if($this->Valid->valid3()== TRUE){
                $this->Session->setFlash("Dữ liệu hợp lệ !");
            }else{
                $this->Session->setFlash("Dữ liệu không hợp lệ!");
            } 
        }        
    }
    function vidu4(){
        $this->Valid->set($this->data);
        if($this->data){
            if($this->Valid->valid4()== TRUE){
                $this->Session->setFlash("Dữ liệu hợp lệ !");
            }else{
                $this->Session->setFlash("Dữ liệu không hợp lệ!");
            } 
        }        
    }
    
}