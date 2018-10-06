<?php
include '../connection.php';
if(isset($_GET['t']))
{
    if($_GET['t']==1)
    {
        $up=mysql_query("update leave_details set st=1 where id='".$_GET['lvid']."'");
        $up1=mysql_query("update leave_data set st=1 where id='".$_GET['lid']."'");
    }
     if($_GET['t']==2)
    {
        $up=mysql_query("update leave_details set st=0 where id='".$_GET['lvid']."'");
        $up1=mysql_query("update leave_data set st=1 where id='".$_GET['lid']."'");
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
                    <li>
                        <a href="staff.php"><i class="fa fa-fw fa-users"></i> Add Staff</a>
                    </li>
                    <li class="active">
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
                            Leave <small>Requests</small>
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
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Leave Request</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-5">
                                    <?php
                                    $sel_lv=mysql_query("select * from leave_data where st=0");
                                    if(mysql_num_rows($sel_lv)>0)
                                    {
                                        ?>
                                    <table class="table table-bordered table-condensed table-hover table-responsive">
                                        <tr>
                                            <td>#</td>
                                            <td>Request from</td>
                                            <td>Date from</td>
                                            <td>Date from</td>
                                            <td></td>
                                        </tr>
                                        <?php
                                        $i=0;
                                        while($r_lv=mysql_fetch_row($sel_lv))
                                        {
                                            $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php
                                            $sel_st=mysql_query("select * from staf_data where em='$r_lv[1]'");
                                            $r_st=mysql_fetch_row($sel_st);
                                            echo $r_st[1];
echo "<br />".$r_lv[4]
                                            ?></td>
                                            <td><?php echo $r_lv[2] ?></td>
                                            <td><?php echo $r_lv[3] ?></td>
                                            <td><a href="lapp.php?lid=<?php echo $r_lv[0] ?>"><span class="glyphicon glyphicon-search"></span></a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php
                                    }
                                    else
                                    {
                                        echo"No data Found";
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-7">
                                  <?php
                                  if(isset($_GET['lid']))
                                  {
                                  $sel_lv1=mysql_query("select * from leave_details where lv_id='".$_GET['lid']."'");
                                  if(mysql_num_rows($sel_lv1)>0)
                                  {
                                      ?>
                                    <table class="table table-bordered table-condensed table-hover">
                                        <tr>
                                            <td>#</td>
                                            <td>Date</td>
                                            <td>Assigned Work</td>
                                            <td>Assigned To</td>
                                            <td></td>
                                        </tr>
                                        <?php
                                        $i=0;
                                        while($r_lv1=mysql_fetch_row($sel_lv1))
                                        {
                                            $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $r_lv1[2] ?>
                                            <?php
                                            if($r_lv1[4]==1)
                                            {
                                                echo " (For Noon)";
                                            }
                                            else if($r_lv1[4]==2)
                                            {
                                                echo " (After Noon)";
                                            }
                                            else
                                            {
                                                echo " (Full Day)";
                                            }
                                            ?>                                           
                                            </td>
                                            <td><?php echo $r_lv1[3] ?></td>
                                            <td><?php echo $r_lv1[5] ?></td>
                                            
                                            <TD>
                                                <?php
                                                if($r_lv1[9]==-1)
                                                {
                                                ?>
                                                <a href="lapp.php?t=1&lid=<?php echo $_GET['lid'] ?>&lvid=<?php echo $r_lv1[0]?>"><span class="glyphicon glyphicon-thumbs-up" style="color:green"></span></a>
                                                 <a href="lapp.php?t=2&lid=<?php echo $_GET['lid'] ?>&lvid=<?php echo $r_lv1[0]?>"><span class="glyphicon glyphicon-thumbs-down" style="color:red"></span></a>
                                            <?php
                                                }
                                                else if($r_lv1[9]==1)
                                                {
                                                    ?>
                                                 <span class="label label-success">SELECTED</span>
                                                        <?php
                                                }
                                                 else if($r_lv1[9]==0)
                                                {
                                                    ?>
                                                 <span class="label label-danger">REJECTED</span>
                                                        <?php
                                                }
                                                ?>
                                            </TD>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>   
                                    <?php
                                  }
                                  }
                                else{
                                    echo"No report dnd";
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
