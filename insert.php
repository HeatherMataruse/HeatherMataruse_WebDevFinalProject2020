<?php
$username = $_POST['username'];
$Password = $_POST['Password'];
$email  = $_POST['email'];
$confirm_password = $_POST['confirm_password'];

//this makes sure that the variables should not be empty
if (!empty($username)|| !empty($email)|| !empty($Password)|| !empty($confirm_password)){
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = 'root';
    $dbname = 'MyProject';

//    creating connection
    $connection =  new mysqli($host, $dbusername,$dbname,$dbpassword);
    if (mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
    else{
            $SELECT = "SELECT email FROM  Users WHERE email = ?LIMIT 1 ";
            $INSERT = "INSERT INTO Users (username,password ,email,confirm_password) values (?,?,?,?)";

            $statement = $connection->prepare($SELECT);
            $statement->bind_param('s', $email);
            $statement->execute();
            $statement->bind_result($email);
            $statement->store_result();
            $rows = $statement->num_rows;
            if ($rows==0){
                $statement->close();
                $statement = $connection->prepare($INSERT);
                $statement->bind_param('ssss', $email,$username,$Password,$confirm_password);
                $statement->execute();
                echo "new information inserted successfully";
            }
            else{
                echo "someone already registered with that email";
            }
        $statement->close();
        $connection->close();

    }
}else{
    echo "All fields are required";
    die();
}

