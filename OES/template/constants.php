<?php
if(!defined("BASE_PATH")) define("BASE_PATH", "http://localhost/Capstone1/OES/"); // the link of the folder in your htdocs 
if(!defined("DB_HOSTNAME")) define("DB_HOSTNAME", "172.0.3.79:3306"); // default value is "localhost" 
if(!defined("DB_USERNAME")) define("DB_USERNAME", "ojt"); // default value is "root"
if(!defined("DB_PASSWORD")) define("DB_PASSWORD", "12345"); // defalut value is ""
if(!defined("DB_NAME")) define("DB_NAME", "db_abis");  // default is "db_abis"

function base_url(String $link = "") {
    return BASE_PATH."{$link}"; // the link of the folder in your htdocs
}


?>