<?php
    session_start();
    include "connection.php";
    if(!empty($_POST['sub']))
    { 
        $username=$_POST['Uname'];
        $_SESSION['username']=$username;
        $password=$_POST['Pass'];
        $_SESSION['password']=$password;
        $query="SELECT * FROM Officer WHERE UName='$username' AND OfPassword='$password'";
        $result=sqlsrv_query($conn,$query,array(), array( "Scrollable" => 'static' ));
        $count=sqlsrv_num_rows($result);
        if ($count === 1) {
            header("Location: Officer Details.php");
            exit();
        }
        else{
            header("Location: index.php");
            exit();
        }
    }
    else{
        echo "Submission error";
        exit();
    }
?>