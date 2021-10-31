<?php
    include "connection.php";
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    //password
    $password = strip_tags($password);//remove html tags
    $password = md5($password);//encrypting password

    $query ="SELECT `id`, `username` FROM `users` WHERE `email` = ? and `password` = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();

    
    $result = $stmt->get_result();//get the rows to result
   
    
    $row = $result->fetch_assoc();//extract each row and put it in row

    if($row)
    {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        $error_array['success'] = 1;

        $json = json_encode($error_array);
        echo $json;
    }
    else{
        
        $error_array['success'] = 0;

        $json = json_encode($error_array);
        echo $json;
    }


?>