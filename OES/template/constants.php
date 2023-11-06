<?php
if(!defined("BASE_PATH")) define("BASE_PATH", "http://localhost:3030/");
if(!defined("DB_HOSTNAME")) define("DB_HOSTNAME", "172.0.3.79:3306"); //localhost
if(!defined("DB_USERNAME")) define("DB_USERNAME", "patrick_ojt"); // root
if(!defined("DB_PASSWORD")) define("DB_PASSWORD", "12345"); 
if(!defined("DB_NAME")) define("DB_NAME", "db_abis"); 
echo "<pre>";
var_dump($_SERVER); die;
function base_url(String $link = "") {
    return "http://localhost:3030/{$link}";
}


?>