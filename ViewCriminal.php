<!DOCTYPE html>
<?php
     session_start();
?>
<html>
    <head>
      <title>Criminal Details</title>
      <link rel="icon" href="handcuffs.jpg" type="image/x-icon" style="opacity:0.5 ;"> 
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
        
        body{
            font-family: 'Quicksand', sans-serif;  
            padding: 75 px;  
            margin: 10px;
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
          padding:20px;
          border:2px solid white;
          width: 100%;
          line-height:40px;
          align-items: center;
        }
        a{
            color: black;
            text-decoration: none;
        }
        a:hover{
            color: aquamarine;
            background-color: rgb(0,0,0);
            cursor: pointer;
        }
        </style>
    </head>
    <body>
        <h1 style="text-align: center; color: aliceblue ;font-size: 50px">Criminal Details</h1>
        <table align="center" border="1px" >
        <thead>
        <tr align="center">
            <th>Criminal Number</th>
            <th>Criminal Name</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody>
            <?php
                include "connection.php";
                $query1="SELECT CNo,CName FROM Criminal";
                $params1=array();
                $stmt=sqlsrv_query($conn,$query1,$params1);
                ?>
                <form method="post">
                <?php
                while($row=sqlsrv_fetch_array( $stmt)){
                    echo "<tr align='center'>";
                    echo "<td>" . $row['CNo'] . "</td>";
                    echo "<td>" . $row['CName'] . "</td>";
                    echo '<td><a href="CriminalDetails.php?link=' . $row['CNo'] .' " >Click here to view details</a></td>';
                    echo "</tr>";
                }
                ?>
                </form>
                <?php
            ?>
        </tbody>
        </table>
    </body>
</html>