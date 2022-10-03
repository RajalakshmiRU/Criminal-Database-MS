<?php
    include "connection.php";
    $id=$_GET["link"];
    $query1="DELETE FROM Officer WHERE Id =?";
    $params1=array($id);
    $result=sqlsrv_query($conn,$query1,$params1);
    if( $result === false )  
    {  
      echo "Error in execution of SELECT.\n";  
      die( print_r( sqlsrv_errors(), true));  
    }
    else
    {
        header("Location: Officers.php");
    }

?>