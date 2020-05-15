<?php
class ExcuteFunctions{
    public function retrieverecords($data){
//        connecting to database
       $mysqli = connectToDb();

       $query = "SELECT ".$data['requestname']." FROM users";
       $result = $mysqli->query($query);
       $output = $result->fetch_array(MYSQLI_BOTH);
       return $output;

    }

    public function GetUserByID($userid){
        $mysqli = connectToDb();

        $query = "SELECT ".$userid['requestname']." FROM users";
        $result = $mysqli->query($query);
        $output = $result->fetch_array(MYSQLI_BOTH);
        return $output;


    }

    public function GetAllUsers($name){
        $mysqli = connectToDb();

        $query = "SELECT ".$name['requestname']." FROM users";
        $result = $mysqli->query($query);
        $output = $result->fetch_array(MYSQLI_BOTH);
        return $output;

    }
}
