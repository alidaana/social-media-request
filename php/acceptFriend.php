<?php
    include "connection.php";
    session_start();
    $user_id=$_SESSION['user_id'];// get user id from sessions
    // $user_id = 10;
    $user_from = $_POST['user_from']; // get the id of the from request
    
    // insert values to database
    $query = "INSERT INTO `friends`(`user_one`, `user_two`) VALUES (?,?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ii",$user_id,$user_from);
    $stmt->execute();

    //delete all requests from user to other user 
    $check = "DELETE FROM `friend_requests` WHERE user_from=? AND user_to=?";
    $stmt = $connection->prepare($check);
    $stmt->bind_param("ii",$user_from,$user_id);
    $stmt->execute();

    //delete all requests from other user to user 
    $check = "DELETE FROM `friend_requests` WHERE user_from=? AND user_to=?";
    $stmt = $connection->prepare($check);
    $stmt->bind_param("ii",$user_id,$user_from);
    $stmt->execute();

    $arr = ['success'=>1];
    $error_array[] = $arr;

    $json = json_encode($error_array);
    echo $json;

?>