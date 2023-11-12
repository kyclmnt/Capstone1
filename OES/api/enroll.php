<?php
require "../template/constants.php";
require "../db/conn.php";

$data = "";
foreach ($_POST as $k => $v) {
    if (!empty(trim($v)) && $k != "submit") {
        if (!empty($data)) $data .= ",";
        $data .= "`" . $k . "`=\"" . $v . "\"";
    }
}

if ($conn == false) {
    die(mysqli_connect_error());
}
$sql = "INSERT INTO tb_form SET {$data}";
// echo $sql; die;
if (mysqli_query($conn, $sql)) {
    echo json_encode(['result'=>['status'=>"success", 'message' => 'Inserted successfully!!']]);
} else {
    echo json_encode(['result'=>['status'=>"error", 'message' => mysqli_error($conn)]]);

}
mysqli_close($conn);
die;


?>