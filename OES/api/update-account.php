<?php
require "../template/constants.php";
require "../db/conn.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = "";
    foreach($_POST as $k=>$v) {    
        if(!empty($data)) $data .= ",";
        $data .= "`$k` = '$v'";
    }
    $sql = "UPDATE `tb_user_acc` as `tua`
            SET {$data}
            WHERE `tua`.id = {$_POST['id']}
    ";
    // echo $sql; die;
    $query = $conn->query($sql);
    if($query) {
        $status = "success";
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['email'] = $_POST['email'];

        echo json_encode(['result' => ['status' => $status, 'message' => 'Account updated successfully',"user" => $_SESSION]]);
    } else {
        $status = "error";
        echo json_encode(['result' => ['status' => $status]]);
    }

    $conn->close();
    
}



?>