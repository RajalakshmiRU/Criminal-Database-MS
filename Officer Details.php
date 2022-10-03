<!DOCTYPE html>
<?php
     session_start();
?>
<html>
    <head>
      <title>Officer Details</title>
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
        h2{
          color: burlywood;
          font-size: 50px;
          text-align: center;
        }
        a{
            text-decoration: none;
        }
        header{
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 0px 10%;
            background-color: #2C3E50;
            justify-content: space-between;
            border-radius: 10px;
        }
        
        .logo{
            color: #FFF;
            font-weight: 900;
        }
        nav ul{
            display: flex;
            flex-direction: row;
            float: right;
        }
        nav ul a{
            color: #FFF;
            display: block;
            padding: 10px 20px;
            border-radius: 1px;
            font-size: 25px;
        }
        
        nav ul a:hover{
            color: #a1ceef;
            background-color: rgb(10, 10, 10);
            border-radius: 5px;
            transition: 0.5s;
        }
        table{
          color: burlywood;
          font-size: 30px;
          padding:20px;
        }
        /* Style the "active" element to highlight the current page */
        nav ul li a.active {
            background-color: #050505;
            color: white;
        }
        .search{
            float:auto;
        }
        /* Style the search box inside the navigation bar */
        input[type=text] {
            float: right;
            padding: 6px;
            border: none;
            margin-top: 8px;
            margin-right: 16px;
            font-size: 17px;
        }
        input[type=text] {
            border: 1px solid #ccc;
        }
        button{
            color:white;
            background-color:black;
            float: right;
        }
      </style>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <a href="Officer Details.php">Home</a>
                    <a href="AddCriminal.html">Add Criminal</a>
                    <a href="ViewCriminal.php">View Details</a>
                </ul>
            </nav>
        </header>
     <?php
     include "connection.php";
     $query1 = "SELECT * FROM Officer WHERE UName=? AND OfPassword=?";  
     $params1 = array($_SESSION['username'],$_SESSION['password']);  
     $stmt=sqlsrv_query($conn,$query1,$params1);
     $row=sqlsrv_fetch_array( $stmt);
     if( $row === false )  
     {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
     }  
     echo "<h2> Welcome " . $row['OName'] . "!</h2>";
     echo "<table align='center'>";
     echo "<tr><td> Name: </td><td>" . $row['OName'] . "</td></tr>";
     echo "<tr><td> Id: </td><td>" . $row['Id'] . "</td></tr>";
     echo "<tr><td> Username: </td><td>" . $row['UName'] . "</td></tr>";
     echo "<tr><td> Password: </td><td>" . $row['OfPassword'] . "</td></tr>";
     echo "<tr><td> Address: </td><td>" . $row['OfAddress'] . "</td></tr>";
     echo "<tr><td> Phone Number: </td><td>" . $row['PhoneNo'] . "</td></tr>";
     echo "<tr><td> Job: </td><td>" . $row['Job'] . "</td></tr>";
     echo "</table>"; 
     echo "<table>";
?>
</body>
</html>