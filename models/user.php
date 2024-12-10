<?php

class User{
    

    private $connDB;

    public $userId;
    public $userFullname;
    public $userBirthDate;
    public $userName;
    public $userPassword;
    public $userImage;

    public $message;

    public function __construct($connDB){
        $this->connDB = $connDB;
    }



    public function newUser(){

        $strSQL = "insert into 
  user_tb (
    `userFullname`, 
    `userBirthDate`, 
    `userName`, 
    `userPassword`, 
    `userImage`
  )
values
  (
    :userFullname, 
    :userBirthDate, 
    :userName, 
    :userPassword, 
    :userImage
  )";

  $this->userFullname = htmlspecialchars(strip_tags($this->userFullname));
  $this->userBirthDate = htmlspecialchars(strip_tags($this->userBirthDate));
  $this->userName = htmlspecialchars(strip_tags($this->userName));
  $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
  $this->userImage = htmlspecialchars(strip_tags($this->userImage));

  $stmt = $this->connDB->prepare($strSQL);

  $stmt->bindParam(":userFullname", $this->userFullname);
  $stmt->bindParam(":userBirthDate", $this->userBirthDate);
  $stmt->bindParam(":userName", $this->userName);
  $stmt->bindParam(":userPassword", $this->userPassword);
  $stmt->bindParam(":userImage", $this->userImage);

  if($stmt->execute()){
    return true;
  }else{
    return false;
  }

    }


    public function checkLoginUser(){
        
        $str = "select * from user_tb where userName = :userName and userPassword = :userPassword";

        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));

        $stmt = $this->connDB->prepare($str);

        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userPassword", $this->userPassword);

        $stmt->execute();

        return $stmt;
    }





}
?>