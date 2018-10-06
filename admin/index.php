<?php
include '../connection.php';
if(isset($_POST['sub']))
{
    $stf=$_POST['stf'];
    $mnth=$_POST['mnth'];
    header("location:index.php?st=".$stf."&mn=".$mnth);    
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
    <title>SB Admin - Bootstrap Admin Template</title>
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
                    <a href="../#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator <b class="caret"></b></a>
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
                        <a href="staff.php"><i class="fa fa-fw fa-users"></i> Add Staff</a>
                    </li>
                    <li>
                        <a href="lapp.php"><i class="fa fa-fw fa-envelope"></i> Leave Application</a>
                    </li>
                    
                    <li>
                        <a href="search.php"><i class="fa fa-fw fa-search"></i> Search</a>
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
                            Dashboard <small>Statistics Overview</small>
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
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Staff data</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                <table class="table table-bordered table-condensed table-hover table-responsive">
                                    <tr>
                                        <td>
                                            <select name="stf" class="form-control" style="width: 50%; float: left;">
                            <option value="">Choose<option>
                                    <?php
                                    $sel_st=mysql_query("select * from staf_data");
                                        if(mysql_num_rows($sel_st)>0)
                                        {
                                            while($r_st=mysql_fetch_row($sel_st))
                                            {
                                   ?>
                            <option value="<?php echo $r_st[4] ?>"><?php echo $r_st[1] ?></option>
                              <?php
                                            }
                              }
                              ?>
                               
                          
                        </select>
                                            <input type="month" value="" name="mnth" class="form-control" style="width:40%; float: left;" />
                                            <input type="submit" name="sub" value="Click here" class="btn btn-danger" />
                                        </td>
                                    </tr>
                                </table>
                                    <?php
                                    if(isset($_GET['st']))
                                    {
                                        ?>
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
                $uid=$_GET['st'];
                $mn=$_GET['mn'];
                $query_date = $_GET['mn']."-01";   
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
                                    <a href="print1.php?st=<?php echo $_GET['st'] ?>&mn=<?php echo $_GET['mn'] ?>" target="_BLANK">print</a>
                <?php                                  
               
                                    }
                                    else
                                    {
                                    
                ?>    
           
                            
                                   
                                </form>
<a href="print.php" target="_BLANK" class="label label-danger">Print</a>

                                <?php
                                $c_date=date('Y-m-d');
                                $sel_stf=mysql_query("select * from staf_data where st=1 ");
                                if(mysql_num_rows($sel_stf)>0)
                                {
                                    ?>
                                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                   <tr>
                                       <td rowspan="2">#</td>
                                       <td rowspan="2">Name</td>
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
                                   $i=0;
                                   while($r_stf=mysql_fetch_row($sel_stf))
                                   {
                                       $i++;
                                       ?>
                                   <tr>
                                       <td><?php echo $i ?></td>
                                       <td><?php echo $r_stf[1] ?></td>
                                       <td>
                    <?php
                    $sel_time=mysql_query("select * from log_time where dt='$c_date' and stf_id='$r_stf[4]' ");                    
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
                    $sel_lv=mysql_query("select * from leave_details where dt='$c_date' and uid='$r_stf[4]' and (schdul=1 || schdul=3) and st>0");
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
                        $sel_time=mysql_query("select * from log_time where dt='$c_date' and stf_id='$r_stf[4]'");      
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
                    $sel_lv1=mysql_query("select * from leave_details where dt='$c_date' and uid='$r_stf[4]' and (schdul=2 || schdul=3) and st>0");
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
                        $sel_time1=mysql_query("select * from log_time where dt='$c_date' and stf_id='$r_stf[4]'");      
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
                $sel_per=mysql_query("select * from permission_data where dat='".$c_date."' and uid='$r_stf[4]'");
                
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
                                <?php
                                }
                                    }
                                ?>
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
