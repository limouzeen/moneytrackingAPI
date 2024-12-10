<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");


require_once './../connectdb.php';
require_once './../models/money.php';

$connDB = new ConnectDB();
$money = new Money($connDB->getConnectionDB());


$data = json_decode(file_get_contents("php://input"));

$money->userId = $data->userId;
$money->moneyDetail = $data->moneyDetail;
$money->moneyInOut = $data->moneyInOut;
$money->moneyType = $data->moneyType;
$money->moneyDate = $data->moneyDate;


$result = $money->addIncome();

if ($result == true) {
    $resultArray = array("message" => "1");
    echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);
} else {
    $resultArray = array("message" => "0");
    echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);
}   

?>