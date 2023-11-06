<?php
require "../template/constants.php";
require "../db/conn.php";
// if($_SERVER['REQUEST_METHOD'] ) throw new Error("Invalid Request Method");


$sql = "SELECT 
	    created_at
    FROM tb_form 
    ORDER BY id DESC
    LIMIT 1
";

$result = $conn->query($sql);

echo json_encode(["data" => $result->fetch_object()]);


?>