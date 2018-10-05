
<?php
class Database{
    protected $db_host = 'localhost';
    protected $db_user ='root';
    protected $db_pass ='';
    protected $db_name ='users_manager';

    protected $conn = null ; // đã kết nối thành công hay chưa
    protected $result = null ; // trả về kết quả sau lớp truy vấn


    public function connect(){
        // kết nối dữ liệu
        $this->conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        if($this->conn){
            mysqli_query($this->conn, "SET NAMES 'utf8' ");
        }
            else{
                echo"khong the ket noi csdl";
            }
        
    }

     public function freeResult(){  // là rỗng truy vấn trước 
             if($this->result){
             mysqli_free_result($this->result) ; // thực hiện 100 câu truy vấn thì dòng này sẽ giải phóng 
    	   } 	
               
     }
     // sử lý các câu truy vấn của người dùng : 
    public function query($sql){  // query truy vấn vào csdl 
/*             if($this->result){
               mysqli_free_result($this->result) ; // thực hiện 100 câu truy vấn thì dòng này sẽ giải phóng 
    	   } */	
    	    $this->freeResult();  
    	    $this->result = mysqli_query($this->conn, $sql); // cái này chỉ trả về 2 giá trị và 3 câu truy vấn chỉ thế sửa xóa thêm ;
         //   $this->result = $this->conn->query($sql);
    	 //   echo "Xong";

    }
    public function fetch(){   // fetch trả về kết quả 
    	$row = null ;
    	if($this->result){

            $row = mysqli_fetch_array($this->result); // chuyển đổi 1 bảng dữ liệu sang  1 mảng dữ liệu ;
    	}                                               // mysqli_fetch_array : lấy ra tên cột và vị trí;
         return $row ;
    }

   //
   public function numRows(){ // tra ve so luong ban ghi sau khi co cau truy van lap;
       $rows = null ;
       if($this->result){
       	$rows = mysqli_num_rows($this->result);
       }
       return $rows ;
   }



}

/*$database = new Database();
$database->connect();
$sql = "INSERT INTO users(user_full, user_name, user_pass, user_mail, user_level ) 
        VALUES('tiep', 'tungpro3', '123456', 'tung9@gmail.com', '1')";
$database->query($sql);*/

/*$sql = "SELECT * FROM users" ;
$database->query($sql);
while ($row = $database->fetch()) {
	echo $row['user_mail'].'<br/>';

}*/

/*$sql = "SELECT * FROM users" ;
$database->query($sql);
echo $database->numRows();*/
?>