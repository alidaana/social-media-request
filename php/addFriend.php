<?php
    include "connection.php";
    session_start();

    $error = array();
    $error_array = array();

    $user_id = $_SESSION['user_id'];
    // $user_id = 29;
    $user_to = $_POST['user_to'];// get requested user from the client

    //check if request already exist
    $check = "SELECT * FROM `friend_requests` WHERE user_from=? AND user_to=?";
    $stmt = $connection->prepare($check);
    $stmt->bind_param("ii",$user_id,$user_to);
    $stmt->execute();
    $result = $stmt->get_result();

    //Count number of rows returned
    $num_rows = mysqli_num_rows($result);

    if($num_rows>0){

        $error_array['success'] = 1 ;

        $json = json_encode($error_array);
        echo $json;
    }else{

        // insert values to database
        $query = "INSERT INTO `friend_requests`(`user_from`, `user_to`) VALUES (?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ii",$user_id,$user_to);
        $stmt->execute();

        // select the sender's name
        $query = "SELECT  `username` FROM `users` WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        //insert into notifications
        $description = $row['username']." sent you a friend request!";
        $query = "INSERT INTO `notifications`(`user_to`, `description`) VALUES (?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("is",$user_to,$description);
        $stmt->execute();
    }

    $error_array['success'] = 1;

    $json = json_encode($error_array);
    echo $json;

?>