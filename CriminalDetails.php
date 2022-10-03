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
        h1{
          color: burlywood;
          font-size: 50px;
          text-align: center;
        }
        .row {
          margin-left:-5px;
          margin-right:-5px;
        }
  
        .column {
          float: left;
          width: 50%;
          padding: 5px;
        }
        .row::after {
          content: "";
          clear: both;
          display: table;
        }
        table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 40%;
  border: 1px solid #ddd;
  color: burlywood;
  font-size:30px;
  display: inline-block;
  padding:20px;
}

 td {
  text-align: left;
  padding: 30px;
}

      </style>
    </head>
    <body>     
        <?php
        include "connection.php";
        $cno=$_GET["link"];
        $params1=array($cno);
        $query1="SELECT * FROM Criminal WHERE CNo =?";
        $result=sqlsrv_query($conn,$query1,$params1);
        $row=sqlsrv_fetch_array( $result);
        if( $row === false )  
        {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query2="SELECT * FROM FIR WHERE CNo =?";
        $result=sqlsrv_query($conn,$query2,$params1);
        $row1=sqlsrv_fetch_array( $result);
        if( $row === false )  
        {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }  
        $query3="SELECT * FROM Crime WHERE CNo =?";
        $result=sqlsrv_query($conn,$query3,$params1);
        $row2=sqlsrv_fetch_array( $result);
        if( $row2 === false )  
        {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query4="SELECT * FROM Court WHERE CNo =?";
        $result=sqlsrv_query($conn,$query4,$params1);
        $row3=sqlsrv_fetch_array( $result);
        if( $row3 === false )  
        {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query5="SELECT * FROM Prison WHERE CNo =?";
        $result=sqlsrv_query($conn,$query5,$params1);
        $row4=sqlsrv_fetch_array( $result);
        if( $row4 === false )  
        {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query6="SELECT * FROM CWitness WHERE CNo =?";
        $result=sqlsrv_query($conn,$query6,$params1);
        $row5=sqlsrv_fetch_array( $result);
        if( $row5 === false )  
        {  
          echo "Error in execution of SELECT.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        echo "<h1>Criminal Details</h1>";
        echo "<hr><br>";
        echo "<table align='center'>";
        echo "<tr><td> Number: </td><td>" . $row['CNo'] . "</td></tr>";
        echo "<tr><td> Name: </td><td>" . $row['CName'] . "</td></tr>";
        echo "<tr><td> Date of Birth: </td><td>" . $row['DOB']->format('Y-m-d') . "</td></tr>";
        echo "<tr><td> Height: </td><td>" . $row['Height'] . "</td></tr>";
        echo "<tr><td> Weight: </td><td>" . $row['CWeight'] . "</td></tr>";
        echo "<tr><td> Gender: </td><td>" . $row['Gender'] . "</td></tr>";
        echo "<tr><td> Age: </td><td>" . $row['Age'] . "</td></tr>";
        echo "<tr><td> Identification Mark: </td><td>" . $row['IdMark'] . "</td></tr>";
        echo "</table>";
        echo "<table>";
        echo "<tr><td> Witness Name: </td><td>" . $row5['WName'] . "</td></tr>";
        echo "<tr><td> Age: </td><td>" . $row5['Age'] . "</td></tr>";
        echo "<tr><td> Relation to Criminal: </td><td>" . $row5['Relation'] . "</td></tr>";
        echo "<tr><td> Gender: </td><td>" . $row5['Gender'] . "</td></tr>";
        echo "<tr><td> Date Of Birth: </td><td>" . $row5['DOB']->format('Y-m-d') . "</td></tr>";
        echo "<tr><td> Address: </td><td>" . $row5['WAddress'] . "</td></tr>";
        echo "<tr><td> Phone Number: </td><td>" . $row5['PhoneNo'] . "</td></tr>";
        echo "</table>"; 
        echo "<table>";
        echo "<tr><td> Crime Section: </td><td>" . $row2['Section'] . "</td></tr>";
        echo "<tr><td> Proof of Crime: </td><td>" . $row2['Proof'] . "</td></tr>";
        echo "<tr><td> Crime Description: </td><td>" . $row2['Descr'] . "</td></tr>";
        echo "<tr><td> Location: </td><td>" . $row2['Loc'] . "</td></tr>";
        echo "<tr><td> Punishment: </td><td>" . $row2['Punishment'] . "</td></tr>";
        echo "<tr><td> Crime Type: </td><td>" . $row2['CType'] . "</td></tr>";
        echo "</table>"; 
        echo "<table>";
        echo "<tr><td> Court Name: </td><td>" . $row3['CoName'] . "</td></tr>";
        echo "<tr><td> Public Prosecutor: </td><td>" . $row3['PubPro'] . "</td></tr>";
        echo "<tr><td> Government Prosecutor: </td><td>" . $row3['GovPro'] . "</td></tr>";
        echo "<tr><td> Court Address: </td><td>" . $row3['CoAddress'] . "</td></tr>";
        echo "<tr><td> Mode: </td><td>" . $row3['Mode'] . "</td></tr>";
        echo "<tr><td> Judge: </td><td>" . $row3['Judge'] . "</td></tr>";
        echo "</table>"; 
        echo "<table>";
        echo "<tr><td> Place: </td><td>" . $row4['Place'] . "</td></tr>";
        echo "<tr><td> Type </td><td>" . $row4['PType'] . "</td></tr>";
        echo "<tr><td> Location </td><td>" . $row4['Loc'] . "</td></tr>";
        echo "<tr><td> Duration </td><td>" . $row4['Duration'] . "</td></tr>";
        echo "<tr><td> Release Date: </td><td>" . $row4['RDate']->format('Y-m-d') . "</td></tr>";
        echo "</table>"; 
        echo "<table>";
        echo "<tr><td> FIR Id: </td><td>" . $row1['FIRId'] . "</td></tr>";
        echo "<tr><td> FIR Date: </td><td>" . $row1['FIRDate']->format('Y-m-d') . "</td></tr>";
        echo "<tr><td> FIR Type: </td><td>" . $row1['FIRType'] . "</td></tr>";
        echo "</table>"; 
        ?>
    </body>
</html>