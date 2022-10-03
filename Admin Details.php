<!DOCTYPE html>
<?php
     session_start();
?>
<html>
    <head>
      <title>Admin Details</title>
      <link rel="icon" href="handcuffs.jpg" type="image/x-icon" style="opacity:0.5 ;"> 
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
        
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
        h1{
            color: #a1ceef;
            text-align: center;
            font-size: 60px;
        }
        h2{
          color: burlywood;
          font-size: 50px;
          text-align: center;
        }
        table{
          color: burlywood;
          font-size: 30px;
          padding:40px;
          border: 3px solid burlywood;
        }
        </style>
    </head>
    <body>
    <?php
     include "connection.php";
     $query1 = "SELECT * FROM AdminTable WHERE UName=? AND AdPassword=?";  
     $params1 = array($_SESSION['username'],$_SESSION['password']);  
     $stmt=sqlsrv_query($conn,$query1,$params1);
     $row=sqlsrv_fetch_array( $stmt);
     if( $row === false )  
     {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
     }  
     echo "<h1> Admin Details </h1>";
     echo "<hr>";
     echo "<h2> Welcome " . $row['AName'] . "!</h2>";
     echo "<table align='center'>";
     echo "<tr><td> Name: </td><td>" . $row['AName'] . "</td></tr>";
     echo "<tr><td> Id: </td><td>" . $row['Id'] . "</td></tr>";
     echo "<tr><td> Username: </td><td>" . $row['UName'] . "</td></tr>";
     echo "<tr><td> Password: </td><td>" . $row['AdPassword'] . "</td></tr>";
     echo "<tr><td> Region: </td><td>" . $row['AdRegion'] . "</td></tr>";
     echo "</table>"; 
?>
</body>
</html>