<?php
 
require 'connection.php';
$conn    = Connect();
$bp    = $conn->real_escape_string($_POST['u_name']);
$concentration   = $conn->real_escape_string($_POST['u_email']);
$name    = $conn->real_escape_string($_POST['subj']);
$plate = $conn->real_escape_string($_POST['message']);
$Product_Form= $conn->real_escape_string($_POST[]);
$type= $conn->real_escape_string($_POST[]);
$volume= $conn->real_escape_string($_POST[]);
$welll= $conn->real_escape_string($_POST[]);
$yield= $conn->real_escape_string($_POST[]);

$query   = "INSERT into DNA_Orders (u_name,u_email,subj,message) VALUES('" . $name . "','" . $email . "','" . $subj . "','" . $message . "')";
$success = $conn->query($query);
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
}
 
echo "Thank You For Contacting Us <br>";
 
$conn->close();
 
?>
