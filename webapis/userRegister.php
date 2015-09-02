<?php

require("Conn.php");
require("MySQLDao.php");

$email = htmlentities($_POST["email"]);
$password = htmlentities($_POST["password"]);
//$email = htmlentities($_GET["email"]); // For testing purpose.
//$password = htmlentities($_GET["password"]);
$returnValue = array();  // Use it for json parsed.

if(empty($email) || empty($password))
{
    $returnValue["status"] = "error";
    $returnValue["message"] = "Missing required field";
    echo json_encode($returnValue);
    return;
}

// Use Database connection beginning.
$dao = new MySQLDao();
$dao->openConnection();
$userDetails = $dao->getUserDetails($email);

if(!empty($userDetails))
{
    $returnValue["status"] = "error";
    $returnValue["message"] = "User already exists";
    echo json_encode($returnValue);
    return;
}

$secure_password = md5($password); // I do this, so that user password cannot be read even by anyone.


$result = $dao->registerUser($email, $secure_password);

if($result)
{
    $returnValue["status"] = "Success";
    $returnValue["message"] = "User is registered successfully!";
    echo json_encode($returnValue);
    $dao->closeConnection();
    return;
}

$dao->closeConnection();
// Close the Database connection after you are done with it.
?>
