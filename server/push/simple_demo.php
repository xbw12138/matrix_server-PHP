<?php
require_once ('XingeApp.php');

//Android 版
//给单个设备下发通知
var_dump(XingeApp::PushTokenAndroid(10000, "secretKey", "title", "content", "token"));
//给单个帐号下发通知
var_dump(XingeApp::PushAccountAndroid(10000, "secretKey", "title", "content", "account"));
//给所有设备下发通知
var_dump(XingeApp::PushAllAndroid(10000, "secretKey", "title", "content"));
//给标签选中设备下发通知
var_dump(XingeApp::PushTagAndroid(10000, "secretKey", "title", "content", "tag"));

