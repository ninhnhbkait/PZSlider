<?php
class User extends AppModel {
    var $name = "User";
	//Hàm kiểm tra tên đăng nhập và mật khẩu
    function checkLogin($username,$password){
        $sql = "Select username,password from users where username='$username' AND password ='$password'"; 
        $this->query($sql); 
        if($this->getNumRows()==0){
            return false; 
        }else{ 
            return true; 
        } 
    }
}
?>