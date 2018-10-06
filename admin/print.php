<?php
include("../connection.php");
?>
<html>
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

<body style="background-color:white;">

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
                                ?>
</body>
</html>
<script>
window.print();
</script>