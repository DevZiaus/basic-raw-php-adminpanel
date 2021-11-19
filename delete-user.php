<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']=='1') {

        $did = $_GET['d'];

        $del = "DELETE FROM rw_users WHERE user_id = '$did'";
        if(mysqli_query($conn, $del)){
            header('Location: all-users.php');
        }

    }else {
        echo "Access Denied!";
    }
?>