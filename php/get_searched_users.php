<?php
    include "connection.php";
    session_start();

    $user_id=$_SESSION['user_id'];// get user id from sessions

    $search_input =  $_POST['search_input']; // get search input

    $temp_array = [];// create array to store the row arrays

    // selecting users who are not blocked
    $query = "SELECT u.id,u.username FROM `users` u WHERE 
                not exists (SELECT 1 FROM `blocked_list` b WHERE b.blocked_by = ? AND b.blocked_user = u.id ) 
                    AND not exists (SELECT 1 FROM `blocked_list` b WHERE b.blocked_by = u.id AND b.blocked_user = ? )
                        AND not exists (SELECT 1 FROM `friends` f WHERE f.user_one = u.id AND f.user_two = ? )
                            AND not exists (SELECT 1 FROM `friends` f WHERE f.user_two = u.id AND f.user_one = ? )
                                AND not exists (SELECT 1 FROM `friend_requests` fr WHERE fr.user_from = ? AND fr.user_to = u.id )";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("iiiii",$user_id,$user_id,$user_id,$user_id,$user_id);
    $stmt->execute();

    $result = $stmt->get_result();//get the rows to result
   
    //extract each row and put it in row
    while($row = $result->fetch_assoc()){
        // get all users searched except the one doing the search and blocked people
        if(strpos(strtolower($row['username']),strtolower($search_input)) !== false && $row['id'] != $user_id){
            $temp_array[] = $row;// add extracted row to array
        }
    }

    $json = json_encode($temp_array, JSON_PRETTY_PRINT);// convert the array of arrays to json
    print_r($json);
?>