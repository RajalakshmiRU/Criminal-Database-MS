<html>
    <head>
        <title>Add Officer</title>
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
                text-align: center;
                color: burlywood;
                font-size: 30px;
            }
            table{
                color: burlywood;
                font-size: 30px;
                padding:20px;
            }
        </style>
    </head>
    <?php
    include "connection.php";
    if ($_POST["password"] === $_POST["confirm_password"]) {
        if(!empty($_POST['sub'])){
            $name=$_POST['Name'];
            $uname=$_POST['Username'];
            $id=$_POST['Id'];
            $pass=$_POST['password'];
            $mno=$_POST['Mobile_Number'];
            $job=$_POST['Job'];
            $add=$_POST['Address'];
            $query="INSERT INTO Officer(OName,Id,OfPassword,OfAddress,PhoneNo,Job,UName) VALUES (?,?,?,?,?,?,?)";
            $params=array($name,$id,$pass,$add,$mno,$job,$uname);
            $result=sqlsrv_query($conn,$query,$params);
            if ($result === false)
            {
                echo "Couldn't add Officer.\n";
                die( print_r( sqlsrv_errors(), true));
            }
            else{
                $query1="SELECT * FROM Officer WHERE UName=? AND OfPassword=?";
                $params1=array($uname,$pass);
                $stmt=sqlsrv_query($conn,$query1,$params1);
                $row=sqlsrv_fetch_array( $stmt);
                echo "<h2> Officer Details Inserted Successfully</h2>";
                echo "<table>";
                echo "<tr><td>Officer Name: </td><td>" . $row['OName'] . "</td></tr>";
                echo "<tr><td>Officer Id: </td><td>" . $row['Id'] . "</td></tr>";
                echo "<tr><td>Officer Username: </td><td>" . $row['UName'] . "</td></tr>";
                echo "<tr><td>Officer Password: </td><td>" . $row['OfPassword'] . "</td></tr>";
                echo "<tr><td>Officer Address: </td><td>" . $row['OfAddress'] . "</td></tr>";
                echo "<tr><td>Officer Phone Number: </td><td>" . $row['PhoneNo'] . "</td></tr>";
                echo "<tr><td>Officer Job: </td><td>" . $row['Job'] . "</td></tr>";
                echo "</table>";
            }
        }
        else{
            echo "Submission error";
            exit();
        }
    }
    else {
        echo "Could not add Officer";
    }
    ?>
</html>