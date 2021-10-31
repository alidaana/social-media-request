<?php
    include "connection.php";
    session_start();

    $user_id=$_SESSION['user_id'];// get user id from sessions
    // $user_id = 10;
    $user_to_remove = $_POST['user_to_remove'];// get requested user from the client

    $check = "DELETE FROM `friends` WHERE user_one=? AND user_two=? OR user_one=? AND user_two = ?";
    $stmt = $connection->prepare($check);
    $stmt->bind_param("iiii",$user_id,$user_to_remove,$user_to_remove,$user_id);
    $stmt->execute();

    
    $error_array['success'] = 1;

    $json = json_encode($error_array);
    echo $json;

?>