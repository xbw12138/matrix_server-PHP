<?php
require_once ('XingeApp.php');
if (isset($_GET['token'])){
    $token = $_GET['token'];
	var_dump(DemoPushSingleDeviceNotification($token));
}
//单个设备下发通知消息
function DemoPushSingleDeviceNotification($token)
{
	$push = new XingeApp(2100214210, '94fcdbb455cdf71da6188e170e4db10f');
	$mess = new Message();
	$mess->setType(Message::TYPE_NOTIFICATION);
	
	$mess->setTitle("订单通知");
	$mess->setContent("您有一笔新订单");
	$mess->setExpireTime(86400);
	//$style = new Style(0);
	#含义：样式编号0，响铃，震动，不可从通知栏清除，不影响先前通知
	$style = new Style(0,1,1,0,0);
	$action = new ClickAction();
	$action->setActionType(ClickAction::TYPE_ACTIVITY);
	$action-> setActivity();
	//$action->setIntent();
	#打开url需要用户确认
	$action->setComfirmOnUrl(1);
	$custom = array('key1'=>'value1', 'key2'=>'value2');
	$mess->setStyle($style);
	$mess->setAction($action);
	$mess->setCustom($custom);
	$acceptTime1 = new TimeInterval(0, 0, 23, 59);
	$mess->addAcceptTime($acceptTime1);
	$ret = $push->PushSingleDevice($token, $mess);
	return($ret);
}