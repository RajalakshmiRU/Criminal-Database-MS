<!DOCTYPE html>
<?php
     session_start();
?>
<html>
    <head>
      <title>Criminal Details</title>
      <link rel="icon" href="handcuffs.jpg" type="image/x-icon" style="opacity:0.5 ;"> 
      <style>
      body{
            font-family: 'Quicksand', sans-serif;
            margin: 50px;  
            padding: 75 px;  
            background-color:#7dd6ffba;  
            font-family:'fantasy';  
            background-image: url(5D27YV.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
        }
        table{
          color: burlywood;
          font-size: 30px;
          padding:5px;
          width: 50%;
        }
        h1{
          color: burlywood;
          font-size: 50px;
          text-align: center;
        }
      </style>
    </head>
    <body>     
        <?php
        include "connection.php";
        $id=$_GET["link"];
        $query1="SELECT * FROM Officer WHERE Id =?";
        $params1=array($id);
        //echo $params1;
        $result=sqlsrv_query($conn,$query1,$params1);
        $row=sqlsrv_fetch_array( $result);
        if( $row === false )  
        {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }  
        echo "<h1>Officer Details</h1>";
        echo "<hr><br>";
        echo "<table align='center'>";
        echo "<tr><td> Id: </td><td>" . $row['Id'] . "</td></tr>";
        echo "<tr><td> Name: </td><td>" . $row['OName'] . "</td></tr>";
        echo "<tr><td> Username: </td><td>" . $row['UName'] . "</td></tr>";
        echo "<tr><td> Password: </td><td>" . $row['OfPassword'] . "</td></tr>";
        echo "<tr><td> Address: </td><td>" . $row['OfAddress'] . "</td></tr>";
        echo "<tr><td> Phone Number: </td><td>" . $row['PhoneNo'] . "</td></tr>";
        echo "<tr><td> Job: </td><td>" . $row['Job'] . "</td></tr>";
        echo "</table>";
        ?>
    </body>
</html>