<?php
ob_start();
include '../connection.php';
session_start();
$uid=$_SESSION['stf'];
$sel=mysql_query("select * from staf_data where em='$uid'");
$r=mysql_fetch_row($sel);
if(isset($_POST['sub']))
{
    $dt=$_POST['dt'];
    $t1=$_POST['t1'];
    $t2=$_POST['t2'];
    $rsn=$_POST['rsn'];
    $t3=strtotime($t2)-strtotime($t1);
    echo gmdate("H:i:s", $t3);
    $dt=$_POST['dt'];
    $t1=$_POST['t1'];
    $t2=$_POST['t2'];
    $rsn=$_POST['rsn'];
    $t3=strtotime($t2)-strtotime($t1);
    $diff=gmdate("H:i:s", $t3);
    $ins=mysql_query("insert into permission_data values('','".date('Y-m-d')."','$uid','$t1','$t2','$diff','0','0','1')");
    if($ins>0)
    {
        header("location:permission.php");
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
                    <li>
                        <a href="staff.php"><i class="fa fa-fw fa-users"></i> Apply Leave</a>
                    </li>
                    <li class="active">
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
                            Add <small>Permission Here :: <?php echo date('Y-m') ?></small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Report</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <form method="post">
                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                            <tr>
                                <td>Permission Date</td>
                                <td><input type="text" name="dt" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly="readonly" /></td>
                            </tr>
                            <tr>
                                <td>Time From </td>
                                <td><input type="time" name="t1" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Time To</td>
                                <td><input type="time" name="t2" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Reason</td>
                                <td><textarea name="rsn" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center><input type="submit" name="sub" value="Add Permission" class="btn btn-success" /></center></td>
                            </tr>
                            </table>
                                    </form>
                                </div>  
                                <div class="col-lg-6">
                                    <?php
                                    $sel_per=mysql_query("select * from permission_data where dat='".date('Y-m-d')."' and uid='$uid'");
                                    if(mysql_num_rows($sel_per)>0)
                                    {
                                        ?>
                                    <table class="table table-bordered table-condensed table-hover table-responsive">
                                        <tr>
                                            <td>#</td>
                                            <td>Time From</td>
                                            <td>Time to</td>
                                            <td>Total</td>
                                        </tr>
                                        <?php
                                        $i=0;
                                        $sum=0;
                                        while($r_per=mysql_fetch_row($sel_per))
                                        {
                                            $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $r_per[3] ?></td>
                                            <td><?php echo $r_per[4] ?></td>
                                            <td><?php echo $r_per[5] ?></td>
                                        </tr>
                                        <?php
                                       
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td><?php //echo $sum; ?></td>
                                        </tr>
                                    </table>
                                    <?php
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
