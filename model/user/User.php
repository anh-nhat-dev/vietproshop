<?php 

class User extends Database {
   protected $user_id = null ;
   protected $user_full = null ;
   protected $user_name = null ;
   protected $user_pass = null ;
   protected $user_mail = null ;
   protected $user_level = null ;

   public function setUserId($user_id){
   	$this->user_id = $user_id ;
   	
   }
     public function getUserId($user_id){
   	    return $this->user_id ;
   	
   }
  

   public function setUserFull($user_full){
   	$this->user_full = $user_full ;
   	
   }
     public function getUserfull($user_full){
   	    return $this->user_full ;
   	

   }
      public function setUserName($user_name){
   	$this->user_name = $user_name ;
   	
   }
     public function getUserName($user_name){
   	    return $this->user_name  ;
   	
   }

      public function setUserPass($user_pass){
   	$this->user_pass = $user_pass ;
   	
   }
     public function getUserPass($user_pass){
   	    return $this->user_pass ;
   	
   }


      public function setUserMail($user_mail){
   	$this->user_mail = $user_mail ;
   	
   }
     public function getUserMail($user_mail){
   	   return $this->user_mail  ;
   	
   }


      public function setUserLevel($user_level){
   	$this->user_level = $user_level ;
   	
   }
     public function getUserLevel($user_level){
       return	$this->user_level ;
   }
  
    function __construct(){
      $this->connect();
    }

   public function login(){
        $sql = "SELECT * FROM users WHERE user_mail = '$this->user_mail' AND user_pass = '$this->user_pass'";
        $this->query($sql);
        if($this->numRows() > 0){
           $_SESSION['mail'] = $this->user_mail ;  // khởi tại phiên làm việc ;
           $_SESSION['pass'] = $this->user_pass ;
           return 'pass';
        }
        else{
          return 'fail';
        }
   }

    public function add(){
         $sql = "SELECT * FROM users WHERE user_name ='this->user_name' OR  user_mail = '$this->user_mail'"; 
           $this->query($sql); 	   
           if($this->numRows() > 0){
            return 'fail';
           }
           else{
            $sql = "INSERT INTO users(user_full,user_name,user_pass,user_mail, user_level)
            VALUES('$this->user_full', '$this->user_name', '$this->user_pass','$this->user_mail', '$this->user_level')" ;
            $this->query($sql);
           }
   }  

    public function edit(){
   	             $sql = "SELECT * FROM users WHERE (user_name ='$this->user_name' OR  user_mail = '$this->user_mail') AND user_id != $this->user_id "; 
           $this->query($sql);     
           if($this->numRows() > 0){
            return 'fail';
           }
           else{
            
            $sql = "UPDATE users SET user_full = '$this->user_full',
                                     user_name = '$this->user_name' ,
                                     user_pass = '$this->user_pass' ,
                                     user_mail = '$this->user_mail' ,
                                     user_level = $this->user_level
                                     WHERE user_id = $this->user_id
                                      " ;

            $this->query($sql);
           }

   }

    public function del (){
   	     $sql = " DELETE FROM users WHERE user_id = $this->user_id" ;
        // return 
         $this->query($sql);
   }


   public function findUserById($id) {
     $sql = "SELECT * FROM users WHERE user_id = $id";
     $this->query($sql);

     return $this->fetch();
     
   }

   }

?>