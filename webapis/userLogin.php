<?php 
require("Conn.php");
require("MySQLDao.php");

$email = htmlentities($_POST["email"]);
$password = htmlentities($_POST["password"]);
//$email = htmlentities($_GET["email"]);
//$password = htmlentities($_GET["password"]);
$returnValue = array();

if(empty($email) || empty($password))
{
    $returnValue["status"] = "error";
    $returnValue["message"] = "Missing required field";
    echo json_encode($returnValue);
    return;
}

$secure_password = md5($password);
$dao = new MySQLDao();
$dao->openConnection();
$userDetails = $dao->getUserDetailsWithPassword($email, $secure_password);

if(!empty($userDetails))
{
    $returnValue["status"] = "Success";
    $returnValue["message"] = "User login successfully!";
    $dao->closeConnection();
    echo json_encode($returnValue);
} else {
    $returnValue["status"] = "error";
    $returnValue["message"] = "User is not found!";
    $dao->closeConnection();
    echo json_encode($returnValue);
}

//$dao->closeConnection();

?>
