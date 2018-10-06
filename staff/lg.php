<?php
ob_start();
include '../connection.php';
session_start();
$uid=$_SESSION['stf'];
if(isset($_GET['x']))
{
date_default_timezone_set('Asia/Calcutta');
$tim=date("h:i:a");
$sel_id=mysql_query("select * from log_time where stf_id='$uid' order by st desc");
$r_id=mysql_fetch_row($sel_id);
echo $r_id[0];
$ins=mysql_query("update log_time set time_out = '$tim' where stf_id='$uid'  and dt='".date('Y-m-d')."'");
echo mysql_error();
if($ins>0)
{
    header("location:../logout.php");
}
}
?>
<html>
    <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <center>
                            <a href="../logout.php" ><span class="btn btn-success">Just Logout from this section</span></a>
                        </center>
                    </div>
                    <div class="col-lg-6">
                        <center>
                            <a href="lg.php?x=1"><span class="btn btn-danger">Need to go home,</span></a>
                        </center>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
