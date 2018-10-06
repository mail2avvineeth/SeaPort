<?php
ob_start();
date_default_timezone_set('Asia/Calcutta');
include '../connection.php';
session_start();
$uid=$_SESSION['stf'];
$sel=mysql_query("select * from staf_data where em='$uid'");
$r=mysql_fetch_row($sel);
$chk_log=mysql_query("select * from log_time where dt='".date('Y-m-d')."' and stf_id='$uid'");
if(mysql_num_rows($chk_log)>0)
{
    
}
 else {
$tim=date('h:i:a');
$ins=mysql_query("insert into log_time values('','$uid','".date('Y-m-d')."','$tim','0','0')");
}
if(isset($_POST['sub']))
{
    $dt=$_POST['dt'];
    $lt=$_POST['lt'];
    $chk_data=mysql_query("select * from leave_details where uid='$uid' and dt='$dt'");
    if(mysql_num_rows($chk_data)>0)
    {
        
    }
    else
    {
        $ins=mysql_query("insert into leave_details values('','0','$dt','nil','3','nil','$uid','0','0','$lt')");
        if($ins>0)
        {
            header("location:index.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trinity Technologies</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">TRINITY</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               
                <li class="dropdown">
                    <a href="../#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $r[1] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="staff.php"><i class="fa fa-fw fa-users"></i> Apply Leave</a>
                    </li>
                    <li>
                        <a href="permission.php"><i class="fa fa-fw fa-clock-o"></i> Apply Permission</a>
                    </li>
                    <li>
                        <a href="lg.php"><i class="fa fa-fw fa-search"></i> LogOut</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            My <small>Work Status :: <?php echo date('Y-m') ?></small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Report</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-7">
                               <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                   <tr>
                                       <td rowspan="2">#</td>
                                       <td rowspan="2">Date</td>
                                       <td colspan="2">Time Information</td>
                                       <td colspan="2">Leave Information</td>
                                       <td rowspan="2">Permission Data</td>
                                   </tr>
                                   <tr>
                                       <td>Time In</td>
                                       <td>Time Out</td>
                                       <td>FN</td>
                                       <td>AN</td>
                                   </tr>
            
                <?php
                if(isset($_GET['mn']))
                {
                 $query_date = $_GET['mn']."-01";   
                }
                else
                {
                    $query_date = date('Y-m')."-01";
                }                
                $dt1=date('Y-m-01', strtotime($query_date));
                $dt2=date('Y-m-t', strtotime($query_date));
                $sdate=  strtotime($dt1);
                //$edate=strtotime($dt2);
                $edate=strtotime(date('Y-m-d'));
                $x=1;
                $y=0;
                for($i=$sdate;$i<=$edate;$i+=86400)
                {
                    $y++;
                    $c_date=date("Y-m-d", $i); 
                    
                    ?>
            <tr>
                <td><?php echo $y ?></td>
                <td><?php echo $c_date ?></td>
                <td>
                    <?php
                    $sel_time=mysql_query("select * from log_time where dt='$c_date' and stf_id='$uid'");                    
                    $r_time=mysql_fetch_row($sel_time);
                    echo $r_time[3];
                    ?>
                </td>
                <td>
                    <?php 
                    echo $r_time[4];
                    ?>
                </td>
                <td><center>
                    <?php
                    $sel_lv=mysql_query("select * from leave_details where dt='$c_date' and uid='$uid' and (schdul=1 || schdul=3) and st>0");
                    if(mysql_num_rows($sel_lv)>0)
                    {
                    $r_lv=mysql_fetch_row($sel_lv);     
                    if($r_lv[4]==1 || $r_lv[4]==3)
                    {
                    if($r_lv[9]=="1" ||$r_lv[9]=="2")
                    {
                        ?>
                    <span class="glyphicon glyphicon-thumbs-down" title="Leave" style="color: red"></span>
                    <?php
                    }
                    else if ($r_lv[9]=="3")
                    {
                        ?>
                        <span class="glyphicon glyphicon-globe" title="Off Day" style="color: red"></span>
                        <?php
                    }
                    else
                    {
                        ?>
                    <span class="glyphicon glyphicon-thumbs-up" title="Present" style="color: green"></span>
                    <?php
                    }
                    }
                    }
                    else
                    {
                        $sel_time=mysql_query("select * from log_time where dt='$c_date' and stf_id='$uid'");      
                        if(mysql_num_rows($sel_time)>0)
                        {
                            ?>
                    <span class="glyphicon glyphicon-thumbs-up" style="color: green"></span>
                    <?php
                        }
                        else
                        {
                             ?>
                    <span class="glyphicon glyphicon-thumbs-down" style="color: orange" title="Attendance Not Marked"></span>
                    <?php
                        }
                    }
                    
                    ?>
            </center></td>
            <td>
                <center>
                    <?php
                    $sel_lv1=mysql_query("select * from leave_details where dt='$c_date' and uid='$uid' and (schdul=2 || schdul=3) and st>0");
                    if(mysql_num_rows($sel_lv1)>0)
                    {
                    $r_lv1=mysql_fetch_row($sel_lv1); 
                    if($r_lv1[4]==2 || $r_lv1[4]==3)
                    {
                    if($r_lv1[9]=="1" ||$r_lv1[9]=="2")
                    {
                        ?>
                    <span class="glyphicon glyphicon-thumbs-down" title="Leave" style="color: red"></span>
                    <?php
                    }
                    else if ($r_lv[9]=="3")
                    {
                        ?>
                    <span class="glyphicon glyphicon-globe" title="Off Day" style="color: red"></span>
                        <?php
                    }
                    else
                    {
                        ?>
                    <span class="glyphicon glyphicon-thumbs-up" title="Present" style="color: green"></span>
                    <?php
                    }
                    }
                    }
                    else
                    {
                        $sel_time1=mysql_query("select * from log_time where dt='$c_date' and stf_id='$uid'");      
                        if(mysql_num_rows($sel_time1)>0)
                        {
                            ?>
                    <span class="glyphicon glyphicon-thumbs-up" style="color: green"></span>
                    <?php
                        }
                        else
                        {
                             ?>
                    <span class="glyphicon glyphicon-thumbs-down" style="color: orange" title="Attendance Not Marked"></span>
                    <?php
                        }
                    }
                    ?>
            </center>
            </td>
            <td>
                <?php
                $sel_per=mysql_query("select * from permission_data where dat='".$c_date."' and uid='$uid'");
                
                                    if(mysql_num_rows($sel_per)>0)
                                    {
                                        while($r_per=mysql_fetch_row($sel_per))
                                        {
                                        echo $r_per[3]." to ".$r_per[4]."<span style='float:right'>$r_per[5]</span><br />";
                                        }
                                    }
                ?>
                
            </td>
            </tr>
                <?php                                  
                }
                ?>    
           
                               </table>
                                </div>
                                <div class="col-lg-5">
                                    <h4>Work Assigned by Leave</h4>
                                    <?php
                                    $dtt=date('Y-m-d');                                    
                                    $sel_wrk=mysql_query("select * from leave_details where dt>='$dtt' and  tmp1='$uid' and st>0");
                                    if(mysql_num_rows($sel_wrk)>0)
                                    {
                                      ?>
                                    <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                        <tr>
                                            
                                            <td>Date</td>
                                            <td>Assigned Work</td>
  
                                        </tr>
                                        <?php
                                        $i=0;
                                        while($r_wrk=mysql_fetch_row($sel_wrk))
                                        {$i++;
                                            ?>
                                        <tr>
                                            
                                            <td><?php echo $r_wrk[2] ?></td>
                                            <td>
                                                <?php
                                                echo "<i>Assigned work : </i>".$r_wrk[3];
                                                $sel_st=mysql_query("select * from staf_data where em='$r_wrk[6]'");
                                                $r_st=mysql_fetch_row($sel_st);
                                                echo "<br />From : ".$r_st[1];
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php
                                    }
                                    else
                                    {
                                        echo "No Work Assigned for You";
                                    }
                                    ?>
                                    <h4>Total Status</h4>
                                    1. Total Days Worked: 
                                    <?php
                                    $mn=date('Y-m');
                                    $sel1=mysql_query("select * from log_time where stf_id='$uid' and dt like '%$mn%'");
                                    echo mysql_num_rows($sel1);
                                    ?><br />
                                    2. Total Leave Taken :<br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    a. Full Day : <?php 
                                    $sel2=mysql_query("select * from leave_details where uid ='$uid' and dt like '%$mn%' and schdul=3 and st=1");
                                    echo mysql_num_rows($sel2);                                    
                                    ?><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    b. For Noon : <?php 
                                    $sel2=mysql_query("select * from leave_details where uid ='$uid' and dt like '%$mn%' and schdul=1 and st=1");
                                    echo mysql_num_rows($sel2);                                    
                                    ?><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    c. After Noon : <?php 
                                    $sel2=mysql_query("select * from leave_details where uid ='$uid' and dt like '%$mn%' and schdul=2 and st=1");
                                    echo mysql_num_rows($sel2);                                    
                                    ?><br />
                                    3. Off Days :
                                    <?php
                                    $sel2=mysql_query("select * from leave_details where uid ='$uid' and dt like '%$mn%' and schdul=3 and st=3");
                                    echo mysql_num_rows($sel2);
                                    ?>
<br /><br />
<form method="post">
                                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                    
                                    <tr>
                                        <td colspan="2"><center><b>MANAGE OFF DAY - UNEXPECTED LEAVE</b></center></td>                                        
                                    </tr>
                                    <tr>
                                        <td>Choose Date</td>
                                        <td><input type="date" name="dt" class="form-control" required="required" /></td>
                                    </tr>
                                    <tr>
                                        <td>Leave Type</td>
                                        <td><select name="lt" class="form-control">
                                                <option value="3">Off Day</option>
                                                
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><center><input type="submit" name="sub" value="ADD LEAVE" class="btn btn-success" /></center></td>
                                    </tr>
                                </table>
</form>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
