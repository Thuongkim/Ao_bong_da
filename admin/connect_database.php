<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'ao_bong_da';
$connect = mysqli_connect($server,$user,$pass,$database);
mysqli_set_charset($connect,'utf8');