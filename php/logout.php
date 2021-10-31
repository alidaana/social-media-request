<?php
    include "connection.php";
    session_start();

    session_destroy();

    header("Location: ../index.html");

    // $error['success'] = 1;
    // $error_array[] = $error;

    // $json = json_encode($error_array);
    // echo $json;
?>