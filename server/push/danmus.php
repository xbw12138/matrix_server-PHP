<?php
require_once ('XingeApp.php');
if (isset($_GET['title'])&&isset($_GET['content'])){
	$title = $_GET['title'];
    $content = $_GET['content'];
	var_dump(DemoPushAllDeviceMessage($title,$content));
}
//所有设备下发透传消息       注：透传消息默认不展示
function DemoPushAllDeviceMessage($title,$content)
{
	$push = new XingeApp(2100214210, '94fcdbb455cdf71da6188e170e4db10f');
	$mess = new Message();
	$mess->setTitle($title);
	$mess->setContent($content);
	$mess->setType(Message::TYPE_MESSAGE);
	$ret = $push->PushAllDevices(0, $mess);
	return $ret;
}
