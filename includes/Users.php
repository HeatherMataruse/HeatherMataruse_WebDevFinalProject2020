<?php
$servername = "localhost";
$Email = "Email";
$Password = "Password";
$Name = "Name";
$ConfirmPassword = "ConfirmPassword";
$db = "HeatherProject";

// Create connection
$conn = mysqli_connect($servername, $Email, $Password,$Name,$ConfirmPassword,$db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
try {
    $conn = new PDO("mysql:host=$servername;$db=MyProject", $Email, $Password ,$Name,$ConfirmPassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

