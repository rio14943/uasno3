<?php 
// Config database
session_start();
$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'tokosaya',
]; 
// Global Variabel db untuk query 
$con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['name']);
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
};  

function base_url($url = null) {
    $base_url = "http://localhost/cla/cla/auth";
    if($url != null) {
        return $base_url. "/" .$url;
    } else {
        return $base_url;
    }
};
?>