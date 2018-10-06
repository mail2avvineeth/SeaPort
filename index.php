<?php
ob_start();
include './connection.php';
if(isset($_POST['sub']))
{
$uid=$_POST['uid'];
$pas=$_POST['pas'];
$sel=mysql_query("select * from user_log where uid='$uid' and pas='$pas'");
if(mysql_num_rows($sel)>0)
{
    session_start();    
    $r=mysql_fetch_row($sel);
    if($r[3]=="admin")
    {
        $_SESSION['adm']=$uid;
        header("location:admin/index.php");
    }
    else
    {
        $_SESSION['stf']=$uid;
        header("location:staff/index.php");
    }
}
else
{
    header("location:index.php?error=1");
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Trinity Technologies <b class="caret"></b></a>
                    
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="display: none;">
                    <li class="active">
                        <a href="adminhome.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="staff.php"><i class="fa fa-fw fa-users"></i> Add Staff</a>
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
                            User <small>Login</small>
                        </h1>
                       
                    </div>
                </div>
              

                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <form method="post">
                                <table class="table table-bordered table-condensed table-hover table-responsive">
                                    <tr>
                                        <td>User ID</td>
                                        <td><input type="text" name="uid" class="form-control" required="required"</td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" name="pas" class="form-control" required="required"</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><center><input type="submit" name="sub" value="Login Here" class="btn btn-danger" /></center></td>
                                    </tr>
                                </table>
                                </form>
                            </div>
                            <div class="col-lg-3"></div>
                            
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
