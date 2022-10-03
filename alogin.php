<?php
    session_start();
    include "connection.php";
    if(!empty($_POST['sub']))
    { 
        $username=$_POST['Uname'];
        $password=$_POST['Pass'];
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $query="SELECT * FROM AdminTable WHERE UName='$username' AND AdPassword='$password'";
        $result=sqlsrv_query($conn,$query,array(), array( "Scrollable" => 'static' ));
        $count=sqlsrv_num_rows($result);
        if ($count === 1) {
            header("Location: Ahome.html");
            exit();
        }
        else{
            $_SESSION["error"] = $error;
            header("Location: index.php");
            exit();
        }
    }
    else{
        echo "Submission error";
        exit();
    }
?>