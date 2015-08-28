<?php 
$link = mysqli_connect('oooserscom.ipagemysql.com', 'oooserscom', '123456'); 
if (!$link) { 
    die('Could not connect: ' . mysqli_error()); 
} 
echo 'Connected successfully'; 
mysqli_select_db('ooosers'); 
?> 
