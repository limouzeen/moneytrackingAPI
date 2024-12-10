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

$user->userName = $data->userName;
$user->userPassword = $data->userPassword;  


$result = $user->checkLoginUser();

if ($result->rowCount() > 0) {

    $resultData = $result->fetch(PDO::FETCH_ASSOC);
    extract($resultData);

    $resultArray = array(
        "message" => "1",
        "userId" => strval($userId),
        "userFullname" => $userFullname,
        "userBirthDate" => $userBirthDate,
        "userName" => $userName,
        "userPassword" => $userPassword,
        "userImage" => $userImage
    );

    echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);

} else {
    // ส่งข้อความกลับไปถ้าไม่พบข้อมูล
    $resultArray = array(
        "message" => "0"
    );
    echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);
}

?>