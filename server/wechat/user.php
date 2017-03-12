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
$sql="select     user_name,user_sign,user_image_head,user_sex,user_age,user_schoolname,user_talk,user_signtime,user_bg,user_vip,user_token from     user_information where user_phone='$user_phone'";
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Matrix个人中心
                <small>User Center</small>
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
                            <h3 class="box-title">个人信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                
                            </div><?php
                            if($result=mysql_query($sql)){
								while($row=mysql_fetch_array($result)){		
                                ?>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> 
											
											<center><img src="<?php if($row['2']!=null)echo $row['2'];else echo "images/logo.png"; ?>" width="100" height="100"></center><br>
											昵称: <code><?php echo $row['0']; ?></code><br>
											说明: <code><?php echo $row['1']; ?></code><br>
											性别: <code><?php echo $row['3']; ?></code><br>
											年龄: <code><?php echo $row['4']; ?></code><br>
											地址: <code><?php echo $row['5']; ?></code><br>
											
                                            </p>
                                            <p align="right">注册时间: <?php echo $row['7']; ?></p>
											
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
							<?php }} ?>
                        </div><!-- /.box-body -->
								<div class="callout callout-warning">
									<p align="right">
										<a class="btn btn-primary" style="text-decoration: none;" href="user/logout.php">注销</a>
									</p>
                                 
								</div>

                    </div><!-- /.box -->
                </div><!-- /.col (left) -->
 
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->