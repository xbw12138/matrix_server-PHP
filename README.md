# matrix_server-PHP
参加过第五届中国软件杯的车联网赛题，获二等奖。客户端程序一直在维护。

一、作品内容简介
“第五届中国软件杯大学生软件设计大赛”
作品简介
作品名称:车辆移动应用软件
所属组别:本科组     
所属学校:山东科技大学 团队名称:Matrix 指导老师:李哲
队 长:冷芝莹
队 员:许博文 张帆

  此款移动应用软件主题为“车联网”,汽车移动互联，通过移动通讯、汽车导航、智能终 端设备和信息网络平台，使得车与路、车与人、车与城市之间实时联网，实现信息的互联互通， 方便人们的出行与车辆管理。
  首先用户进入 app 开始音乐播放，用户也可关注微信公众号，进入主页面，显示当前个人 位置，用户点击我的进入功能界面，注册登录后，可更改完善个人信息;进行预约加油，完善 预约加油订单可提交预约订单，提交数据成功后回到预约加油界面并显示订单详情并且用户可 查看二维码，扫码加油;这里在加油站(商家版)可处理用户的预约请求。用户进入车辆信息 维护界面，显示用户已绑定的车辆信息，用户也可另外绑定新的车辆信息(通过扫描二维码获 取)，当服务器端数据库中显示当前某项车辆信息异常，可及时将信息推送到车主手机端;进 入违章查询界面用户可输入发动机号和车牌号查询车辆的违章信息;新闻资讯功能，用户可随 时查看与车辆有关的信息。在商家端，商家可以处理(扫客户端生成的二维码)用户的预约请 求。

二、客户端
1.主功能界面:包含客户端的主要功能。
2.个人信息:可修改个人信息
3.车辆维护:显示当前车辆信息，若出现故障发送提醒车主
4.预约加油:进入预约加油界面点解右下按钮进入订单填写界面，填写信息提交预约，等待 商家处理。对于自己的订单可长按订单列表选择标记删除该任务，也可从右上历史记录中查看 订单信息。
5.查询功能:包括全国各地的油价、天气、新闻资讯查询，和车辆违章查询
三、商家端
商家版主要实现用户预约的处理，通过扫码完成订单。也有天气资讯，各地油价等基本功能 查询。
四、微信端
系统为 android 版本 APP，为方便所有机型于 IOS 用户，在原有功能的基础上，完成了“车 联网”移动应用微信公众号的开发。用户只需关注“Matrix 车联网(微信号:minimatrix)”， 即可在公众号上体验所有客户端上的功能，比如:车辆维护、违章查询、预约加油等，再小的 系统，也需要整体的完善。
首次关注公众号，可以看到下侧的三个功能按钮，点击即触发相应推送事件，点击“阅读原 文”即进入“车联网”微信网页版。
首次进入，用户需要注册/登陆，一次注册登录后，短期内不再需要再次输入信息登陆， 微信会记忆账户，短期内不需要输入登录。登陆后，进入“车联网”网页版的首页，点击选择 不同的功能，即进入不同的功能页。
下图从左到右依次为用户信息、车辆维护、预约加油(还可查看预约生成的二维码)、新 闻资讯、违章查询、位置定位的截图预览。
    



