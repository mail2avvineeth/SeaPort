<?php
ob_start();
include '../connection.php';
session_start();
$uid=$_SESSION['stf'];
$sel=mysql_query("select * from staf_data where em='$uid'");
$r=mysql_fetch_row($sel);
if(isset($_POST['sub']))
{
    $dt1=$_POST['dt1'];
    $dt2=$_POST['dt2'];
    $rsn=$_POST['rsn'];
    
    $ins=mysql_query("insert into leave_data values('','$uid','$dt1','$dt2','$rsn','0','0','0','0')");
    $insid=  mysql_insert_id();
    if($ins>0)
    {
        header("location:staff.php?insid=$insid");
    }
    /*for($i=$dt1;$i<=$dt2;$i++)
    {
        $ins1=mysql_query("insert into leave_details values('','$insid','$i','','','','0','0','0','0')");
    }*/
}
if(isset($_POST['sub50']))
{
    $count=$_POST['count'];
    for($i=0;$i<$count;$i++)
    {
        $dt=$_POST['dt'.$i];
        $lf=$_POST['lf'.$i];
        $sw=$_POST["sw$i"];
        $asstf=$_POST["asstf$i"];
        $ass=  explode(",", $asstf);
        $ins=mysql_query("insert into leave_details values('','".$_GET['insid']."','$dt','$sw','$lf','$ass[0]','$uid','$ass[1]','0','-1')");
    }
    if($ins>0)
    {
        header("location:staff.php");
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
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
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
                            Apply <small>Leave Here :: <?php echo date('Y-m') ?></small>
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
                                <div class="col-lg-8"> 
                                    <form method="post">
                                        <?php
                                        if(isset($_GET['insid']))
                                        {
                                            $sel_lv=mysql_query("select * from leave_data where stf_id='$uid' and id='".$_GET['insid']."'");
                                            if(mysql_num_rows($sel_lv)>0)
                                            {
                                                ?>
                                        <table class="table table-bordered table-condensed table-hover table-responsive">
                                            <tr>
                                                <td>#</td>
                                                <td>Date</td>
                                                <td>Leave for</td>
                                                <td>Scheduled Work</td>
                                                <td>Assigned staff</td> 
                                            </tr>
                                            <?php
                                            $i=0;
                                            $r_lv=mysql_fetch_row($sel_lv);
                                            $x=0;
                                            $count=0;
                                            for($i=$r_lv[2];$i<=$r_lv[3];$i++)
                                            {
                                                $x++;                                                ?>
                                            <tr>
                                                <td><?php echo $x ?></td>
                                                <td><?php echo $i ?>
                                                <input type="hidden" name="dt<?php echo $count ?>" value="<?php echo $i ?> "/>
                                                </td>
                                                <td><select name="lf<?php echo $count ?>" class="form-control">
                                                        <option value="1">FN</option>
                                                        <option value="2">AN</option>
                                                        <option value="3">Full Day</option>
                                                    </select></td>
                                                    <td>
                                                        <textarea name="sw<?php echo $count ?>" class="form-control"></textarea>
                                                    </td>
                                                    <td>
                                                        <select name="asstf<?php echo $count ?>" class="form-control">
                            <option value="">Choose<option>
                                    <?php
                                    $sel_st=mysql_query("select * from staf_data where em !='$uid'");
                                        if(mysql_num_rows($sel_st)>0)
                                        {
                                            while($r_st=mysql_fetch_row($sel_st))
                                            {
                                   ?>
                            <option value="<?php echo $r_st[1] ?>,<?php echo $r_st[4] ?>"><?php echo $r_st[1] ?></option>
                              <?php
                                            }
                              }
                              ?>
                               
                          
                        </select>
                                                    </td>
                                            </tr>
                                            <?php
                                            $count++;
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="5">
                                                    <input type="hidden" name="count" value="<?php echo $count ?> "/>
                                                    <input type="submit" name="sub50" class="btn btn-danger" /></td>
                                                
                                            </tr>
                                        </table>
                                        <?php
                                            }
                                            else
                                            {
                                                echo "no data found";
                                            }
                                        }
                                        else
                                        {
                                        ?>
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <tr>
                    <td>Leave From</td>
                    <td><input type="date" name="dt1" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Leave to</td>
                    <td><input type="date" name="dt2" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Reason for leave</td>
                    <td><textarea name="rsn" class="form-control" required="required"></textarea></td>
                </tr>    
               
                <tr>
                    <td colspan="3"><center><input type="submit" name="sub" value="Apply Leave" class="btn btn-warning" /></center></td>
                </tr>
            </table>
                                        <?php
                                        }
                                        ?>
                                    </form>
                              </div>  
                                <div class="col-lg-4">
                                    
                                    <?php
                                    if(isset($_GET['liid']))
                                    {
                                        $sel_vl=mysql_query("select * from leave_details where lv_id='".$_GET['liid']."'");
                                        if(mysql_num_rows($sel_vl)>0)
                                        {
                                            ?>
                                    <table class="table table-bordered table-condensed table-hover table-responsive">
                                        <tr>
                                            <td>#</td>
                                            <td>Date</td>
                                            <td>Status</td>
                                        </tr>
                                        <?php
                                        $i=0;                                        
                                        while($r_vl=mysql_fetch_row($sel_vl))
                                        {
                                            $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $r_vl[2] ?>
                                                <span style="float: right;">
                                            <?php
                                            if($r_vl[4]=="1")
                                            {
                                                echo" (F N)";
                                            }
                                            else if($r_vl[4]=="2")
                                            {
                                                echo" (A N)";
                                            }
                                            else if($r_vl[4]=="3")
                                            {
                                                echo" (Full Day)";
                                            }
                                            ?>
                                                </span>
                                            </td>
                                            <td><?php
                                            if($r_vl[9]==1)
                                            {
                                                ?>
                                                <span class="label label-success">APPROVED</span>
                                                <?php
                                            } 
                                            if($r_vl[9]==0)
                                            {
                                                ?>
                                                <span class="label label-danger">REJECTED</span>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                    $sel_lvv=mysql_query("select * from leave_data where stf_id='$uid' order by id desc limit 10");
                                    if(mysql_num_rows($sel_lvv)>0)
                                    {
                                        ?>
                                    <table class="table table-bordered table-condensed table-hover table-responsive">
                                        <tr>
                                            <td>#</td>
                                            <td>Leave from</td>
                                            <td>Leave to</td>
                                            <td>More</td>
                                        </tr>
                                        <?php
                                        $i=0;
                                        while($r_lvv=mysql_fetch_row($sel_lvv))
                                        {
                                            $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $r_lvv[2] ?></td>
                                            <td><?php echo $r_lvv[3] ?></td>
                                            <td>
                                                <?php
                                                if($r_lvv[8]==0)
                                                {
                                                    ?>
                                                <span class="label label-danger">Waiting...</span>
                                                <?php
                                                } 
                                                else
                                                {
                                                    ?>
                                                <a href="staff.php?liid=<?php echo $r_lvv[0] ?>"><span class="label label-success">Verified...</span></a>
                                                <?php
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
                                    else
                                    {
                                        echo "No Data Found";
                                    }
                                    }
                                    ?>
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
