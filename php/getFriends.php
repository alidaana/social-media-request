<?php
    include "connection.php";
    session_start();

    $user_id=$_SESSION['user_id'];// get user id from sessions
    
    // insert values to database
    $query = "SELECT u.id, u.username FROM `friends` f,users u WHERE  f.user_one = u.id and f.user_two = ? or f.user_two = u.id and f.user_one = ? ";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ii",$user_id,$user_id);
    $stmt->execute();

    $result = $stmt->get_result();//get the rows to result
   
    //extract each row and put it in row
    while($row = $result->fetch_assoc()){
        // get all users searched except the one doing the search and blocked people
        if($row['id'] != $user_id){
            $temp_array[] = $row;// add extracted row to array
        }
    }

    $json = json_encode($temp_array);
    echo $json;

?>