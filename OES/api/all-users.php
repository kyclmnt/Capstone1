<?php
require "../template/constants.php";
require "../db/conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST['uid'];
    $data = [];
    $sql = 'SELECT 
                CASE 
                    WHEN TRIM(CONCAT(`tua`.fname, " ",`tua`.lname)) = "" THEN "--"
                    ELSE CONCAT(`tua`.fname, " ",`tua`.lname)
                END as "Name",
                `email` as "Username",
                CASE 
                    WHEN `role` = "A" THEN "ADMIN"
                    WHEN `role` = "F" THEN "FACULTY"
                    ELSE "STUDENT"
                END as "Role"
            FROM `tb_user_acc` `tua` WHERE `tua`.id <> "'.$uid.'"';
    $query = $conn->query($sql);


    while($result = $query->fetch_assoc()) array_push($data, $result);
    
    
    echo json_encode(["data" => $data]);
}

?>