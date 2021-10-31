<?php
    include "connection.php";
    session_start();

    $user_id=$_SESSION['user_id'];// get user id from sessions

    $temp_array = [];// create array to store the row arrays

    // get users who are not blocked
    $query ="SELECT u.id,u.username FROM `users` u WHERE 
                not exists (SELECT 1 FROM `blocked_list` b WHERE b.blocked_by = ? AND b.blocked_user = u.id ) 
                    AND not exists (SELECT 1 FROM `blocked_list` b WHERE b.blocked_by = u.id AND b.blocked_user = ? )";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("ii",$user_id,$user_id);
    $stmt->execute();

    $result = $stmt->get_result();//get the rows to result
   
    //extract each row and put it in row
    while($row = $result->fetch_assoc()){
        // dont get the main user
        if( $row['id'] != $user_id){
            $temp_array[] = $row;// add extracted row to array
        }
    }

    $json = json_encode($temp_array, JSON_PRETTY_PRINT);// convert the array of arrays to json
    print_r($json);
?>