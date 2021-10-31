<?php
    include "connection.php";
    session_start();

    $user_id=$_SESSION['user_id'];// get user id from sessions
    // $user_id = 10;
    $user_from = $_POST['user_from']; // get the id of the from request
    

    //delete all requests from other user to user 
    $check = "DELETE FROM `friend_requests` WHERE user_from=? AND user_to=?";
    $stmt = $connection->prepare($check);
    $stmt->bind_param("ii",$user_from,$user_id);
    $stmt->execute();


    $arr = ['success'=>1];
    $error_array[] = $arr;

    $json = json_encode($error_array);
    echo $json;

?>