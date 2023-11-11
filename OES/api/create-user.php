<?php
require "../template/constants.php";
require "../db/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] != $_POST['re-enter-pass']) {
        echo json_encode(['result' => ['status' => "error", "message" => "Password and Confirmation pass did not match"]]);
        die;
    } else {
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
    }
}
