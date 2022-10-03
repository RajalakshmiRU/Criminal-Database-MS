<?php
    include "connection.php";
    if(!empty($_POST['sub']))
    {
        $cno=$_POST['cno'];
        $cname=$_POST['cname'];
        $gender=$_POST['gender'];
        $idmark=$_POST['idmark'];
        $dob=$_POST['dob'];
        $cage=$_POST['cage'];
        $cwt=$_POST['cwt'];
        $cht=$_POST['cht'];
        $fdate=$_POST['fdate'];
        $fid=$_POST['fid'];
        $ftype=$_POST['ftype'];
        $fdesc=$_POST['fdesc'];
        $CoName=$_POST['CoName'];
        $PuPro=$_POST['PuPro'];
        $GovPro=$_POST['GovPro'];
        $CoAddress=$_POST['CoAddress'];
        $mode=$_POST['mode'];
        $judge=$_POST['judge'];
        $crsec=$_POST['crsec'];
        $crproof=$_POST['crproof'];
        $crloc=$_POST['crloc'];
        $puni=$_POST['puni'];
        $desc=$_POST['desc'];
        $Crtype=$_POST['Crtype'];
        $prplace=$_POST['prplace'];
        $prtype=$_POST['prtype'];
        $prloc=$_POST['prloc'];
        $dur=$_POST['dur'];
        $rdate=$_POST['rdate'];
        $wname=$_POST['wname'];
        $wrel=$_POST['wrel'];
        $wage=$_POST['wage'];
        $wgender=$_POST['wgender'];
        $wdob=$_POST['wdob'];
        $wadd=$_POST['wadd'];
        $wphno=$_POST['wphno'];
        $query1="INSERT INTO Criminal(CNo,CName,DOB,Height,CWeight,Gender,Age,IdMark) VALUES (?,?,?,?,?,?,?,?)";
        $params1=array($cno,$cname,$dob,$cht,$cwt,$gender,$cage,$idmark);
        $result=sqlsrv_query($conn,$query1,$params1);
        if( $result === false )  
        {  
          echo "Error in execution of Criminal.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query2="INSERT INTO FIR(FIRId,FIRDate,FIRType,FIRDesc,cno) VALUES (?,?,?,?,?)";
        $params2=array($fid,$fdate,$ftype,$fdesc,$cno);
        $result=sqlsrv_query($conn,$query2,$params2);
        if( $result === false )  
        {  
          echo "Error in execution of FIR.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query3="INSERT INTO Crime(Section,Proof,Descr,Loc,Punishment,CType,CNo) VALUES (?,?,?,?,?,?,?)";
        $params3=array($crsec,$crproof,$desc,$crloc,$puni,$Crtype,$cno);
        $result=sqlsrv_query($conn,$query3,$params3);
        if( $result === false )  
        {  
          echo "Error in execution of Crime.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query4="INSERT INTO Prison(Place,PType,Loc,Duration,RDate,CNo) VALUES (?,?,?,?,?,?)";
        $params4=array($prplace,$prtype,$prloc,$dur,$rdate,$cno);
        $result=sqlsrv_query($conn,$query4,$params4);
        if( $result === false )  
        {  
          echo "Error in execution of Prison.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query5="INSERT INTO Court(CoName,CNo,PubPro,GovPro,CoAddress,Mode,Judge) VALUES (?,?,?,?,?,?,?)";
        $params5=array($CoName,$cno,$PuPro,$GovPro,$CoAddress,$mode,$judge);
        $result=sqlsrv_query($conn,$query5,$params5);
        if( $result === false )  
        {  
          echo "Error in execution of Court.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        $query6="INSERT INTO CWitness(WName,Age,Relation,Gender,DOB,WAddress,PhoneNo,CNo) VALUES (?,?,?,?,?,?,?,?)";
        $params6=array($wname,$wage,$wrel,$wgender,$wdob,$wadd,$wphno,$cno);
        $result=sqlsrv_query($conn,$query6,$params6);
        if( $result === false )  
        {  
          echo "Error in execution of Witness.\n";  
          die( print_r( sqlsrv_errors(), true));  
        }
        if($result)
        {
            header("Location: ViewCriminal.php");
        }
    }
?>
