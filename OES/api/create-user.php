<?php
require "../template/constants.php";
require "../db/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $errors = [];
    if ($_POST['password'] != $_POST['re-enter-pass']) {
        echo json_encode(['result' => ['status' => "error", "message" => "Password and Confirmation password did not match"]]);
        die;
    }
    if(strlen(trim($_POST['password'])) < 8) array_push($errors,'Must have atleast eight characters.');
    if(!preg_match('/[A-Z]/', $_POST['password'])) array_push($errors,'Must have atleast one capital letter.');
    if(!preg_match('/\d/', $_POST['password'])) array_push($errors,'Must have atleast one number.');
    if(!preg_match('/[^A-Za-z0-9]/', $_POST['password'])) array_push($errors,'Must have atleast one special character.');

    if(!$errors) {
        $data = "";
        foreach ($_POST as $key => $val) {
            if ($key == "id" || $key == "re-enter-pass") continue;
            if (!empty($data)) $data .= ",";
            $val = trim($val);
            if ($key == "password") $data .= "`{$key}` = PASSWORD('{$val}')";
            else $data .= "`{$key}` = '{$val}'";
        }
    
        $sql = "INSERT INTO `tb_user_acc` SET {$data}";
    
        if($conn->query($sql)) echo json_encode(['result' => ['status' => 'success', 'message'=>'New use inserted']]);
        else echo json_encode(['result' => ['status' => 'error', 'message'=>$conn->error]]);
    } else {
        // throw new Error(json_encode($errors));
        echo json_encode(['result'=>['status'=>'error', 'message' => "[" . implode(",",$errors) . "]"]]);
    }
}
