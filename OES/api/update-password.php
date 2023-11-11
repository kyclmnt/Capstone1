<?php
require "../template/constants.php";
require "../db/conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST['id'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $reenterpass = $_POST['re-enter-pass'];

    if($newpass != $reenterpass) {
        echo json_encode(['result'=>['status'=>"error", "message"=>"New password and Confirmation pass did not match"]]); die;
    }

    if(check_oldpass($conn, $oldpass)) {
        
        $sql = "UPDATE `tb_user_acc` AS `tua` SET  `tua`.password = PASSWORD('{$newpass}') WHERE `tua`.id = '{$uid}'";

        if($conn->query($sql)) {
            echo json_encode(['result'=>['status' => "success", "message"=>"Your password is successfully updated!"]]); 
            die();
        } else { echo json_encode(['result'=>['status'=>'error', 'message'=>$conn->error]]); die(); }
    } else { echo json_encode(['result'=>['status' => "error", "message"=>"Incorrect Old Passowrd"]]); die(); }
}

function check_oldpass($conn, $pass) {
    $sql = "
            SELECT 
                * 
            FROM
            `tb_user_acc` as `tua`
            WHERE `tua`.password = PASSWORD('{$pass}')
            LIMIT 1
        ";

    $result = $conn->query($sql);
    return $result;
}
