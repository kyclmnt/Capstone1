<?php 

$conn = new mysqli('localhost', 'root', '', 'db_abis');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}

?>
