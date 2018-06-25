<?php
class SessionsController extends AppController{
    public $helpers = array('Html');
    public $components = array('Session');
    function index(){
        //Tạo session
        $this->Session->write("Username", "nongdanit");
        $this->Session->write("Name.fullname", "Nguyen Van A");
        $this->Session->write("Name.email", "abc@nongdanit.info");
        //Đọc session
        $a = $this->Session->read("Username");
        $this->set("a",$a);
        
        $fullname = $this->Session->read("Name.fullname");
        $this->set('fullname', $fullname);
        
        $arrayName = $this->Session->read("Name");
        $this->set('arrayName', $arrayName);
        
        //Kiểm tra session
        if($this->Session->check("Username")){
            $b = "Tồn tại username";
        }else{
            $b = "Không tồn tại username";
        }
        $this->set('checkusername', $b);
        
        //Tạo thông báo, các bạn lần lượt hiện các thông báo này để thấy sự khác biệt nhá
        
        $this->Session->setFlash('Example message text default','default',array('class'=>'example_class'));
        //$this->Session->setFlash('Example message text flash_custom','flash_custom');
        //$this->Session->setFlash('Example message text flash_custom2','flash_custom2');
        
        
        //Xóa session
        //$this->Session->delete('Username');
        //$this->Session->destroy();
        
        
    }
    
}