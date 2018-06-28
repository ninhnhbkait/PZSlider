<?php
class UsersController extends AppController{    
    var $name = "Users";
    var $helpers = array("Html","Session");
    var $components = array("Session");
    
    function beforeFilter(){
        parent::beforeFilter();
    }
    function index(){
       $data = $this->User->find("all"); 
       $this->set("data",$data);
    }
    function admin_index(){
       $data = $this->User->find("all");
       $this->set("data",$data);
    }
    function admin_edit($id){
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('User này không phù hợp');
            $this->redirect("/admin/users");//chuyển đến /admin/users/index
        }
        
        if(empty($this->data)) {
                $this->data = $this->User->read(null, $id);//Lấy thông tin user
        }else{
            $this->User->set($this->data);
            if($this->User->validateUser()){
                $this->User->save($this->data);
                $this->Session->setFlash("Cập nhật user thành công");
                $this->redirect("/admin/users"); //chuyển đến /admin/users/index
            }
        }
    }
    function admin_add() {
        if(!empty($this->data)){
          $this->User->set($this->data);
          if($this->User->validateUser()){
            $this->User->save($this->data);
            $this->Session->setFlash("Thêm user thành công !");
            $this->redirect("/admin/users");  
          }
        }else{
          $this->render();          
        }
    }
    function admin_delete($user_id){
        if(isset($user_id) && is_numeric($user_id)){
            $data = $this->User->read(null,$user_id);
            if(!empty($data)){
                $this->User->delete($user_id);
                $this->Session->setFlash("Username đã được xóa với với id=".$user_id);
            }else{
                $this->Session->setFlash("Username không tồn tại với id=".$user_id);
            }
        }else{
            $this->Session->setFlash("Username không tồn tại");
        }
        $this->redirect("/admin/users");
    }  
    function login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                if ($this->Auth->user('level') == 1){
                    $this->redirect("/admin/users/index");
                }else{
                    $this->redirect("/users/index");
                }
            }else{
                $this->Session->setFlash('Username hoặc password sai','default',array('class'=>"alert alert-success"));
            }
        }
    }
    function logout(){
        $this->redirect($this->Auth->logout());
    }
}