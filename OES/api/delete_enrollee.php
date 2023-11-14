<?php
require "../template/constants.php";
require "../db/conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = ""; // id's to be delete
    foreach($_POST['stud_id'] as $k=>$v) {
            if(!empty($data)) $data .= ",";
            $data .= $v;
    }

    

    $sql = "UPDATE `tb_form` as `tbf`
            SET `tbf`.deleted_flag = '1'
            WHERE `tbf`.id IN ({$data})
    ";

    // echo $sql; die;  
    $query = $conn->query($sql);
    if($query) {
        $status = "success";
        echo json_encode(['result' => ['status' => $status, 'message' => 'Record Deleted Successfully']]);
    } else {
        $status = "error";
        echo json_encode(['result' => ['status' => $status, 'message' => $conn->error]]);
    }
    $con->close();

}

?>