<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");


require_once './../connectdb.php';
require_once './../models/user.php';


$connDB = new ConnectDB();
$user = new User($connDB->getConnectionDB());


$data = json_decode(file_get_contents("php://input"));

$user->userFullname = $data->userFullname;
$user->userBirthDate = $data->userBirthDate;
$user->userName = $data->userName;
$user->userPassword = $data->userPassword;




if (isset($data->userImage) && !empty($data->userImage)) {
    $picture_temp = $data->userImage; // รูปภาพในรูปแบบ base64
    $picture_filename = "user_" . uniqid() . "_" . round(microtime(true) * 1000) . ".jpg";

    // แปลงข้อมูล base64 เป็นรูปภาพและบันทึกลงในโฟลเดอร์
    if (file_put_contents(__DIR__ . "/../picupload/user/" . $picture_filename, base64_decode($picture_temp))) {
        $user->userImage = $picture_filename; // บันทึกชื่อไฟล์ในฐานข้อมูล
    } else {
        echo json_encode(["message" => "Error uploading image"]);
        exit;
    }
} else {
    // ใช้ภาพเริ่มต้นเมื่อไม่มีการส่งภาพมา
    $user->userImage = "default_img.jpg";
}

$result = $user->newUser();

if ($result == true) {
    $resultArray = array("message" => "1");
    echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);
} else {
    $resultArray = array("message" => "0");
    echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);
}




?>