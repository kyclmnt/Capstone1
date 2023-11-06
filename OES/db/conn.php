<?php

$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn) die("Error => " . $conn->error);
?>