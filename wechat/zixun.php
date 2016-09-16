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
$page=(int)$_GET['page'];
$rowz=mysql_fetch_row(mysql_query("select count(*) from newsa"));
$num=$rowz[0]-$page*10;
$i=1;
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Matrix资讯
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
                            <h3 class="box-title">汽车之家</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <h4>注意!</h4>
                                <p>我们只是搬运工</p>
									<center>
                                       
										
										<a class="btn btn-primary" style="text-decoration: none;" href="zixun.php?page=<?php echo ++$page; ?> " >下一页</a>
									</center>
                                 
                            </div><?php
							if($num>=0){
							$sql="select url,pic,title,content,time from newsa limit $num , 10";
                            if($result=mysql_query($sql)){
								while($row=mysql_fetch_array($result)){		
                                ?>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> 
											<?php echo $row['2']; ?><br>
											<img src="<?php if($row['1']!=null)echo $row['1'];else echo "images/logo.png"; ?>" width="100" height="100"><br>
											<code><?php echo $row['3']; ?></code><br>
											
                                            </p>
                                            <p align="right"><?php echo $row['4']; ?></p>
											
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
							<?php }}} ?>
                        </div><!-- /.box-body -->


                    </div><!-- /.box -->
                </div><!-- /.col (left) -->
 
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->