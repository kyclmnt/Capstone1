<?php
require "../template/constants.php";
require "../db/conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = "";
    foreach($_POST as $k=>$v) {
        
        if($k != "save" && $k != "id" && !empty(trim($v))) {
            
            if(!empty($data)) $data .= ",";
            $data .= "`$k` = '$v'";
        }
    }
    $sql = "UPDATE `tb_form` as `tbf`
            SET {$data}
            WHERE `tbf`.id = {$_POST['id']}
    ";

    $query = $conn->query($sql);
    if($query) {
        $status = "success";
        echo json_encode(['result' => ['status' => $status, 'message' => 'Record updated successfully.']]);
    } else {
        $status = "error";
        echo json_encode(['result' => ['status' => $status, 'message' => $conn->error]]);
    }

    $con->close();
    
}



?>