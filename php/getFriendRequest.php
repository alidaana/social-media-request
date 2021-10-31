<?php
    include "connection.php";
    session_start();

    $user_id=$_SESSION['user_id'];// get user id from sessions
    // $user_id=10;
    $temp_array = [];// create array to store the row arrays

    // get users who are not blocked
    $query ="SELECT u.username,u.id FROM `friend_requests` fr,`users` u WHERE user_to = ? and u.id = fr.user_from";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("i",$user_id);
    $stmt->execute();

    $result = $stmt->get_result();//get the rows to result
   
    //extract each row and put it in row
    while($row = $result->fetch_assoc()){
        // dont get the main user
        
        $temp_array[] = $row;// add extracted row to array
        
    }

    $json = json_encode($temp_array, JSON_PRETTY_PRINT);// convert the array of arrays to json
    print_r($json);
?>