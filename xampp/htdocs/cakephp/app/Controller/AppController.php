<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
    public $components = array(
        'Auth'=>array(
            'userModel' => 'User',//sử dụng model User
            'fields' => array('username' => 'username', 'password' => 'password'),//sử dụng 2 field "username","password" để so sánh xem có hợp lệ không 
            'loginAction' => array('admin'=>false, 'controller'=>'users', 'action'=>'login'),//Khi chưa đăng nhập sẽ tự chuyển tới
            'loginRedirect' => array('admin'=>true, 'controller'=>'users', 'action'=>'index'),//Khi đăng nhập thành công
            'authError' => 'Không thể truy cập',//báo lỗi
            'authorize' => array('Controller'),
        )
        //ngay chổ admin có 2 giá trị true và false,
    );
    function beforeFilter(){
        Security::setHash("md5");//mã hóa password là md5
        $this->set('current_user', $this->Auth->user());//sau khi đăng nhập thành công biến current_user là thông tin user đăng nhập
    }
    function isAuthorized(){
        return true;
   }
}