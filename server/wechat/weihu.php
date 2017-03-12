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
$sql = "SELECT keep_id,light,shiftstate,enginestate,oilcount,colometer,carlevel,enginenum,platenum,logo,brand,send_time,model\n"
    . "FROM keep_information\n"
    . "WHERE keep_id = (\n"
    . "SELECT MAX(keep_id) \n"
    . "FROM keep_information\n"
    . "WHERE user_phone ='$user_phone')";
$i=1;
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Matrix车辆维护
                <small>Vehicle Maintenance</small>
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
                            <h3 class="box-title">车辆维护</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <h4>注意!</h4>
                                <p>请及时保养您的车子</p>
                            </div><?php
                            if($result=mysql_query($sql)){
								while($row=mysql_fetch_array($result)){	
									$i++;								
                                ?>
                                <div class="nav-tabs-custom">
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> 
											型号: <code><?php echo $row['10']." ".$row['12']; ?></code><br>
											LOGO: <img src="<?php echo $row['9']; ?>" ><br>
											发动机号: <code><?php echo $row['7']; ?></code><br>
											车身级别: <code><?php echo $row['6']; ?></code><br>
											里程: <code><?php echo $row['5']; ?></code><br>
											油量: <code><?php echo $row['4']; ?></code><br>
											发动机性能: <code><?php echo $row['3']; ?></code><br>
											车灯性能: <code><?php echo $row['1']; ?></code><br>
											变速器性能: <code><?php echo $row['2']; ?></code><br>
											车牌号: <code><?php echo $row['8']; ?></code><br>
                                            </p>
                                            <p align="right"><?php echo $row['11']; ?></p>
											
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
							<?php }if($i==1){ ?><p><?php echo "还没有您的车辆信息"; ?></p><?php }} ?>
                        </div><!-- /.box-body -->


                    </div><!-- /.box -->
                </div><!-- /.col (left) -->
 
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->