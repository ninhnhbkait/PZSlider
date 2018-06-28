<?php
class BooksController extends AppController{
    public $name = "Books";
    //var $helpers = array('Paginator','Html');
	public $helpers = array('Form','Paginator','Html');
    public $paginate = array();
	
	function view(){
       $conditions = array();
       $data = array();
       if(!empty($this->passedArgs)){
         if(isset($this->passedArgs['Book.title'])) {//kiểm tra xem có tồn tại title hay không
           $title = $this->passedArgs['Book.title'];
           $conditions[] = array( 'Book.title LIKE' => "%$title%", );//điều kiện SQL
           $data['Book']['title'] = $title;//cho giá trị nhập vào mảng data
         }
         if(isset($this->passedArgs['Book.description'])) {
           $description = $this->passedArgs['Book.description'];
           $conditions[] = array( "OR" => array( 'Book.description LIKE' => "%$description%" ) );
           $data['Book']['description'] = $description;
         }
         $this->paginate= array( 'limit' => 2, 'order' => array('id' => 'desc'), );
         $this->data = $data;//Giữ lại giá trị nhập vào sau khi submit
         $post = $this->paginate("Book",$conditions);
         $this->set("posts",$post);
      }
    }
    function search() {
       $url['action'] = 'view';
       foreach ($this->data as $key=>$value){
          foreach ($value as $key2=>$value2){
            $url[$key.'.'.$key2]=$value2;
          }
       }
       $this->redirect($url, null, true);//dùng để chuyển hướng sang action view
	}
    
    function index(){
        $data = $this->Book->find("all");
        /*echo "<pre>";
        print_r($data); exit;
        echo "</pre>";*/
        $this->set("data",$data);
    }   
    function index2() {
    	//có 2 cách viết
    	//Cách 1
    	/*$conditions = array(
    		'conditions' =>  array('description LIKE' => "truyện tiên ma%" ),
    	);

    	$data = $this->Book->find("all" , $conditions);
    	$this->set("data", $data);*/

    	//Cách 2
    	$data = $this->Book->find("all", array(
    		'conditions' => array('description LIKE' => "truyện tiên ma%" ),
    		'limit'      => 2,
    		//'fields'	 => array('title', 'description', 'id'),
    		//'order'		 => array('id DESC'),
    	));
    	$this->set("data", $data);
    	
    }
    function index3(){
    	$data = $this->Book->find("first", array(
    		'conditions'	=> array('id'	=> 3),
    	));
    	/*echo "<pre>";
    	print_r($data);
    	echo "</pre>";*/
    	$this->set("data" , $data);
    }
    function index4(){
    	$sql = "Select * From books";
    	$data = $this->Book->query($sql);
    	$this->set("data" , $data);
    }
    
    function danhsach(){
         $this->paginate = array(
           'limit' => 4,// mỗi page có 4 record
           'order' => array('id' => 'desc'),//giảm dần theo id
         );
         $data = $this->paginate("Book");
         $this->set("data",$data);
    }
}    