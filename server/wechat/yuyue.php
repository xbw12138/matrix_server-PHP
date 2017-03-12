<?php
include_once 'header.php';
require_once 'user/_main.php';
require_once 'lib/yanzhenguser.php';
require("lib/db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) 
or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
$user_phone=$_SESSION['username'];
$finish=$_GET['finish'];
$sql="select     gas_num,gas_station,gas_type,order_time,is_finish,order_id,send_time,url,order_name,order_phone from     order_information where user_phone='$user_phone' and is_finish like '$finish'";
$i=1;
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Matrix预约单
                <small>Order List</small>
            </h1>
        </section>
		
        <!-- Main content -->
        <section class="content">
            <!-- START PROGRESS BARS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-th-list"></i>
                            <h3 class="box-title">预约单</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <h4>注意!</h4>
                                <p>请按预约时间到加油站点加油</p>
									<center>
                                        <a class="btn btn-danger" style="text-decoration: none;" href="yuyue.php?finish=<?php echo "N"; ?> " >预约订单</a>
										
										
										<a class="btn btn-primary" style="text-decoration: none;" href="yuyue.php?finish=<?php echo "Y"; ?> " >历史订单</a>
									</center>
                                 
                            </div><?php
                            if($result=mysql_query($sql)){
								while($row=mysql_fetch_array($result)){		
                                ?>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="dropdown">
                                            <a href="demo.php?url=<?php echo $row[7]; ?>">二维码</a>
                                        </li>
                                        <li class="pull-left header"><i class="fa fa-angle-right"></i> <?php echo "第".$i++."单"; ?></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> 
											地址: <code><?php echo $row['1']; ?></code><br>
											型号: <code><?php echo $row['2']; ?></code><br>
											数量: <code><?php echo $row['0']; ?></code><br>
											预约时间: <code><?php echo $row['3']; ?></code><br>
											手机号: <code><?php echo $row['9']; ?></code><br>
											预约人: <code><?php echo $row['8']; ?></code><br>
                                            </p>
                                            <p align="right"><?php echo $row['6']; ?></p>
											
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
							<?php }if($i==1){ ?><p><?php echo "您还没有预约单"; ?></p><?php }} ?>
                        </div><!-- /.box-body -->


                    </div><!-- /.box -->
                </div><!-- /.col (left) -->
 
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->