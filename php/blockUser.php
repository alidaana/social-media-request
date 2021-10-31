<?php
    include "connection.php";
    session_start();

    $user_id=$_SESSION['user_id'];// get user id from sessions
    $user_to_block = $_POST['user_to_block'];// get requested user from the client

    // insert values to blocked list
    $query = "INSERT INTO `blocked_list`(`blocked_user`, `blocked_by`) VALUES (?,?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ii",$user_to_block,$user_id);
    $stmt->execute();

    $check = "DELETE FROM `friends` WHERE user_one=? OR user_two = ?";
    $stmt = $connection->prepare($check);
    $stmt->bind_param("ii",$user_to_block,$user_to_block);
    $stmt->execute();

    $check = "DELETE FROM `friend_requests` WHERE user_from=? OR user_to = ?";
    $stmt = $connection->prepare($check);
    $stmt->bind_param("ii",$user_to_block,$user_to_block);
    $stmt->execute();



?>