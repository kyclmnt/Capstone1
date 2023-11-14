<?php
require "../template/constants.php";
require "../db/conn.php";

$sql = "";
$data = array();
$query = null;

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT 
            *
            FROM `tb_form` `tbf`
            WHERE `tbf`.id  = {$id} AND `tbf`.deleted_flag = '0'";
} else {
    $sql = 'SELECT 
            `tbf`.id as "id",
            CASE 
                WHEN TRIM(CONCAT(`tbf`.firstname, " ",`tbf`.lastname)) = "" THEN "--"
                ELSE CONCAT(`tbf`.firstname, " ",`tbf`.lastname)
            END as "name",
            CASE
                WHEN `tbf`.strand = "" OR `tbf`.strand IS NULL
                THEN `tbf`.track 
                ELSE `tbf`.strand 
            END as "strand",
            `tbf`.gradelevel as "gradelevel"
            FROM `tb_form` `tbf` WHERE `tbf`.deleted_flag = "0"';
}


$query = $conn->query($sql);


while($result = $query->fetch_assoc()) array_push($data, $result);


echo json_encode(["data" => $data]);
$conn->close();

?>