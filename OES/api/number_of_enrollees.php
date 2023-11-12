<?php
require "../template/constants.php";
require "../db/conn.php";
// if($_SERVER['REQUEST_METHOD'] ) throw new Error("Invalid Request Method");
$sql = "";
if($_POST['by'] == "all") {
    $sql = "SELECT 
              CONCAT('GRADE ',`gradelevel`) as 'gradelevel',
              `track` as 'x',
              count(*) as 'y'
            FROM `tb_form` 
            WHERE `strand` = '' AND  `tb_form`.deleted_flag = '0'
            GROUP BY `gradelevel`, `track`
            UNION ALL
            SELECT 
              CONCAT('GRADE ',`gradelevel`) as 'gradelevel',
              `strand` as 'x',
              count(*) as 'y'
            FROM `tb_form` 
            WHERE `track` = '' AND  `tb_form`.deleted_flag = '0'
            GROUP BY `gradelevel`, `strand`
    ";
} else if($_POST['by'] == "gender") {
  $sql = "SELECT 
          CASE 
            WHEN `sex` = 'M' THEN 'Male'
              ELSE 'Female'
          END as 'gender',
          CASE 
              WHEN `sex` = 'M' THEN 'Male'
                ELSE 'Female'
            END as 'x',
            CAST(count(*)
            / (SELECT 
            count(*)
            FROM `tb_form`
            WHERE `tb_form`.deleted_flag = '0'
            ) * 100 AS int)as 'y'
        FROM `tb_form`
        WHERE `tb_form`.deleted_flag = '0'
        GROUP BY `sex`";
} else if($_POST['by'] == "grade_level") {
  $sql = "SELECT 
            CONCAT('GRADE ',`gradelevel`) as 'x',
          CAST(count(*)
            / (SELECT 
            count(*)
            FROM `tb_form`
            WHERE `tb_form`.deleted_flag = '0'
          ) * 100 AS int) as 'y'
          FROM `tb_form`
          WHERE `tb_form`.deleted_flag = '0'
          GROUP BY `gradelevel`";
} else if($_POST['by'] == "total") {
  $sql = "SELECT COUNT(*) AS 'total' FROM `tb_form` WHERE `tb_form`.deleted_flag = '0'";
}


$result = $conn->query($sql);

$data = array();
while($row = $result->fetch_assoc()) {
    array_push($data, $row);
}   

echo json_encode(["data" => $data]);

?>