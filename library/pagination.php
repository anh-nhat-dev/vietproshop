<?php
include_once("database.php");

 class pagination extends Database{
 	protected $page = null ;//so trang hien tai;
 	protected $per_row = null; // thứ tự bản ghi mỗi trang    
 	protected $rows_per_page = null ; // số bản ghi mỗi trang 

 	protected $total_rows = null ;
 	protected $total_pages = null;
 	protected $list_pages  = null ;   // lấy ra dah sách 
    
    function __construct(){
        $this->connect();
    } 

    public function setPage($page){
    	$this->page = $page;
    }
    public function getPage(){
    	return $this->page ;
    }


    public function setPerRow(){
    	$this->per_row = $this->page*$this->row_per_page - $this->row_per_page;
    }
    public function getPerRow(){
    	return $this->per_row ;
    }


      public function setRowPerPage($row_per_page){
    	$this->row_per_page = $row_per_page;
    }
    public function getRowPerPage(){
    	return $this->row_per_page ;
    }


    public function setTotalRows($table){
    	$sql = "SELECT * FROM $table";
    	$this->query($sql);
    	$this->total_rows = $this->numRows();
    }
    public function getTotalRows(){
    	return $this->total_rows;
    }

   public function setTotalPage(){
    	$this->total_pages = ceil($this->total_rows/$this->row_per_page);
   }
   public function getTotalPage(){
   	return $this->total_pages;
   }

  public function setListPages($master_page){
   // trang dau 
  	  $this->list_pages .='<a href="'.$master_page.'.php">start</a>';
  	  $page_prev = $this->page - 1 ;
  	  $this->list_pages .='<a href="'.$master_page.'.php?page='.$page_prev.'"><<</a>' ;
  	  for($i = 1 ; $i<=$this->total_pages; $i++ ){
  	 	 if($i == $this->page){
               $this->list_pages .= '<span>'.$i.'</span>';
  	 	 }
  	 	 else{
               $this->list_pages .= '<a href="'.$master_page.'.php?page='.$i.'">'.$i.'</a>'; // $master_page truyền vào 1 file bất kỳ ;
  	 	 }

  	 }
  	 // trang cuoi
  	 $page_next = $this->page + 1 ;
  	 $this->list_pages .='<a href="'.$master_page.'.php?page='.$page_next.'">>></a>';
  	 $this->list_pages .='<a href="'.$master_page.'.php?page='.$this->total_pages.'">end</a>';
  }
   
   public function getListPages(){
   	return $this->list_pages;

   }
 }





/*if(isset($_GET['page'])){
	$pagination->setPage($_GET["page"]);
}
else{
	$pagination->setPage(1);
}

$pagination->setRowPerPage(3);
$pagination->setPerRow();

$sql = "SELECT * FROM users LIMIT ".$pagination->getPerRow().", ".$pagination->getRowPerPage();  //từ đâu , bao nhiêu 
$pagination->query($sql);
while ($row = $pagination->fetch()) {
	echo $row['user_mail'].'</br>';
}

 */


// if(isset($_GET['page'])){
// 	$pagination->setPage($_GET["page"]);
// } else {
// 	$pagination->setPage(1);
// }

// $pagination->setRowPerPage(3);
// $pagination->setPerRow();

// $pagination->setTotalRows('users');
// $pagination->setTotalPage();
// $pagination->setListPages('pagination');

// $sql = "SELECT * FROM users LIMIT ".$pagination->getPerRow().", ".$pagination->getRowPerPage();  //từ đâu , bao nhiêu 
// $pagination->query($sql);
// while ($row = $pagination->fetch()) {
// 	echo $row['user_mail'].'</br>';
// }

//  echo $pagination->getListPages();

?>