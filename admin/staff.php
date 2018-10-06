<?php
include '../connection.php';
if(isset($_POST['add_stf']))
{
    $sn=$_POST['sn'];
    $con=$_POST['con'];
    $adr=$_POST['adr'];
    $em=$_POST['em'];
    $pwd=$_POST['pwd'];
    $dob=$_POST['dob'];
    $up=$_FILES['up']['name'];
    $ext1=strrpos($up,".");
    $ext=  substr($up, $ext1);
    $nfn="$em$ext";
    $sel=$_POST['sel'];
    $ins=mysql_query("insert into staf_data values('','$sn','$con','$adr','$em','$dob','$nfn','$sel','1')");
    if($ins>0)
    {
        //if(move_uploaded_file($_FILES['up']['tmp_name'],getcwd()."\\staf_pic\\$nfn"))
        //{
            $ins1=mysql_query("insert into user_log values('','$em','$pwd','$sel','1')");
            if($ins1>0)
            {
                header("location:add_staff.php?successs=1");
            }
        //}
    }
    
}
if(isset($_GET['t']))
{
    $up=mysql_query("update staf_data set st=2 where em='".$_GET['sid']."'");
    if($up>0)
    {
        $del=mysql_query("delete from user_log where em='".$_GET['sid']."'");
        if($del>0)
        {
            header("location:staff.php");
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
                                        <form method="post" enctype="multipart/form-data">
                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            <tr>
                                                <td>Name</td>
                                                <td><input type="text" name="sn" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Contact Number</td>
                                                <td><input type="text" name="con" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><textarea name="adr" class="form-control"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><input type="email" name="em" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Password</td>
                                                <td><input type="password" name="pwd" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>DOB</td>
                                                <td><input type="date" name="dob" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Photo</td>
                                                <td><input type="file" name="up" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Staff Type</td>
                                                <td><select name="sel" class="form-control">
                                                        <option value="staf">Faculty</option>
                                                        <option value="staf">Office Staff</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><center><input type="submit" name="add_stf" value="ADD Now" class="btn btn-success" /></center></td>
                                            </tr>
                                        </table>
                                            </form>
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
                                        <td><a href="staff.php?t=1&sid=<?php echo $r_stf[4] ?>" title="Remove Staff"><span class="glyphicon glyphicon-trash" style="color: red;"></span></a>
                                            <a href="manage_staff.php?sid=<?php echo $r_stf[4] ?>"><span class="glyphicon glyphicon-arrow-right" style="color:green"></span></a>                                            
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
