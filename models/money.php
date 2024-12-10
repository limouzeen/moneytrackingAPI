<?php

class Money{

    private $connDB;

    public $moneyId;
    public $moneyDetail;
    public $moneyInOut;
    public $userId;
    public $moneyDate;
    public $moneyType;

    public $message;


    public function __construct($connDB){
        $this->connDB = $connDB;
    }


    public function getAllMoneyByUserId(){
        
        $strSQL = "select * from money_tb where userId = :userId";

        $this->userId = intval(htmlspecialchars(strip_tags($this->userId)));

        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":userId", $this->userId);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }



    public function addIncome(){

        $strSQL = "insert into money_tb (`userId`, `moneyDetail`, `moneyInOut`, `moneyType`, `moneyDate`) values (:userId, :moneyDetail, :moneyInOut, :moneyType, :moneyDate)";

        $this->userId = intval(htmlspecialchars(strip_tags($this->userId)));
        $this->moneyDetail = htmlspecialchars(strip_tags($this->moneyDetail));
        $this->moneyInOut = doubleval(htmlspecialchars(strip_tags($this->moneyInOut)));
        $this->moneyType = intval(htmlspecialchars(strip_tags($this->moneyType)));
        $this->moneyDate = htmlspecialchars(strip_tags($this->moneyDate));

        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":moneyDetail", $this->moneyDetail);
        $stmt->bindParam(":moneyInOut", $this->moneyInOut);
        $stmt->bindParam(":moneyType", $this->moneyType);
        $stmt->bindParam(":moneyDate", $this->moneyDate);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    




}



?>