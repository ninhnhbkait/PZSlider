<?php
class Valid extends AppModel {    
	public $useTable = false;
    public $validate = array();
    
    
    function valid1(){
        $this->validate = array(
            "name" => array(                
                "rule" => "notBlank",
                "message" => "Name not empty !",
            ),
            "email" => array(                
                "rule" => "notBlank", // tập luật là không rỗng
                "message" => "Email not empty !", // thông báo khi có lỗi
            ),
                                
        ); 
       if($this->validates($this->validate)) // nếu dữ liệu đã được validate (hợp lệ)
        return TRUE; 
       else 
        return FALSE;
    }
    
    function valid2(){
        $this->validate = array(
            "name" => array(
                "dk1" => array(
                    "rule" => "notBlank",
                    "message" => "Name không rỗng !",
                ),
                "dk2" => array(
                    "rule"=> array('lengthBetween', 6, 10),
                    "message" => "Name trong khoảng 6 đến 10 kí tự"
                ),         
                
            ),
            "email" => array(
                "dk1" => array(
                    "rule" => "notBlank",
                    "message" => "Email không rỗng !",
                ),
                "dk2" => array(
                    'rule' => array('email', true),
                    "message" =>"Vui lòng nhập đúng định dạng",
                ),
            ),
            "website" => array(
                "dk1" => array(
                    "rule" => "notBlank",
                    "message" => "Website không rỗng !",
                ),
                "dk2" =>array(
                    "rule" =>"url",
                    "message" => "Vui lòng nhập đúng định dạng website",
                )
            ),
        ); 
       if($this->validates($this->validate))
        return TRUE; 
       else 
        return FALSE;
    }
    
    function valid3(){
        $this->validate = array(
            "name" => array(                
                "rule" => '/^[a-z0-9]{4,10}$/i',
                "message" => "Name phải là chữ và số, trong khoảng 4-10 kí tự",
            ),
            "email" => array(                
                "rule" => '/^[a-z A-Z]{1}[a-z A-Z 0-9_]+\@[a-z A-Z 0-9]{2,}\.[a-z A-Z]{2,}$/i',
                "message" => "Email không hợp lệ",
            ),
                                
        ); 
       if($this->validates($this->validate))
        return TRUE; 
       else 
        return FALSE;
    }
    
    function valid4(){
        $this->validate = array(
            "username" => array(                
                "rule" => 'checkUsername',
                "message" => "Username không chính xác",
            ),
        ); 
       if($this->validates($this->validate))
        return TRUE; 
       else 
        return FALSE;
    }
    
    function checkUsername(){
        if($this->data['Valid']['username']=="nongdanit"){
            //kiểm tra dữ liệu nhập vào của người dùng có đúng là nongdanit hay ko
            //nongdanit này có thể lấy ra từ database chẳng hạn, ở đây ví dụ nên chỉ lấy cứng luôn
            return true;
        }
        else{
            return false;
        }
    }
}
