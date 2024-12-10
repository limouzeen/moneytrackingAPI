<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET"); // ใช้ GET เพื่อดึงข้อมูลการเดินทาง
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");


require_once './../connectdb.php';
require_once './../models/money.php';


$connDB = new ConnectDB();
$money = new Money($connDB->getConnectionDB());


try {
    // รับค่าที่ส่งมาจาก Client/User ซึ่งเป็น JSON มา Decode แล้วมาเก็บไว้ในตัวแปร
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->userId)) {
        echo json_encode(["message" => "userId parameter is missing"]);
        exit;
    }

    // กำหนด userId ที่ต้องการดึงข้อมูล
    $money->userId = $data->userId;

    $result = $money->getAllMoneyByUserId();

    // ตรวจสอบว่าผลลัพธ์เป็น array หรือไม่ และมีข้อมูลหรือไม่
    if (is_array($result) && count($result) > 0) {
        //มีข้อมูล
        $resultInfo = [];

        foreach ($result as $resultData) {
            //สร้างตัวแปรเป็นอาเรย์เก็บข้อมูล 
            $resultArray = [
                "message" => "1",
                "moneyId" => strval($resultData['moneyId']),
                "userId" => strval($resultData['userId']),
                "moneyDetail" => $resultData['moneyDetail'],
                "moneyInOut" => strval($resultData['moneyInOut']),
                "moneyType" => strval($resultData['moneyType']),
                "moneyDate" => $resultData['moneyDate']
            ];

            array_push($resultInfo, $resultArray);
        }

        echo json_encode($resultInfo, JSON_UNESCAPED_UNICODE);
    } else {
        //ไม่มีข้อมูล
        echo json_encode([["message" => "0"]]);
    }
} catch (Exception $e) {
    // จัดการข้อผิดพลาด
    echo json_encode([
        "message" => "An error occurred",
        "error" => $e->getMessage()
    ]);
}





?>