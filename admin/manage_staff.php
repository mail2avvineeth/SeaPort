<?php
include '../connection.php';
if(isset($_GET['sid']))
{
    $sel_stf=mysql_query("select * from staf_data where em='".$_GET['sid']."'");
    $r_stf=mysql_fetch_row($sel_stf);
}
 else {
header("location:index.php");    
}
if(isset($_POST['sub']))
{
    $dt=$_POST['dt'];
    $lt=$_POST['lt'];
    $sid=$_GET['sid'];
    $chk_data=mysql_query("select * from leave_details where uid='$sid' and dt='$dt'");
    if(mysql_num_rows($chk_data)>0)
    {
        
    }
    else
    {
        $ins=mysql_query("insert into leave_details values('','0','$dt','nil','3','nil','$sid','0','0','$lt')");
        if($ins>0)
        {
            header("location:manage_staff.php?sid=".$_GET['sid']);
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
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
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
                            Staff <small>Management</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="col-lg-6">
                                <?php
                                if(isset($_GET['sid']))
                                {
                                    $sel_stf=mysql_query("select * from staf_data where em='".$_GET['sid']."'");
                                    $r_stf=mysql_fetch_row($sel_stf);
                                    ?>
                                <form method="post">
                                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $r_stf[1] ?></td>
                                    </tr>
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
                                                <option value="2">Unexpected Leave</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><center><input type="submit" name="sub" value="ADD LEAVE" class="btn btn-success" /></center></td>
                                    </tr>
                                </table>
                                </form>
                                <?php
                                }
                                
                                ?>
                            </div>
                            <div class="col-lg-6">
                                <?php
                                $sel_stf=mysql_query("select * from staf_data where st=1 order by snme asc");
                                if(mysql_num_rows($sel_stf)>0)
                                {
                                    ?>
                                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                        <td>Contact</td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $i=1;
                                    while($r_stf=mysql_fetch_row($sel_stf))
                                    {
                                        ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $r_stf[1] ?></td>
                                        <td><?php echo $r_stf[2] ?></td>
                                        <td>
                                            <a href="manage_staff.php?sid=<?php echo $r_stf[4] ?>""><span class="glyphicon glyphicon-arrow-right" style="color:green"></span></a>                                            
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                </table>
                                <?php
                                }
                                else
                                {
                                    echo"No data found";
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
