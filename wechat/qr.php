﻿
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <script src="asset/js/qr.js"></script>
    <style>
        #qrcode{
            /*text-align: center;*/
            /*display: table-cell;*/
            /*width: 96px;*/
            /*height: 96px;*/
            /*vertical-align:middle;*/
            /*position: relative;*/
        }
    </style>
</head>
<body>
<div id="qrcode">
</div>
<script>
    window.onload =function(){
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 96,//设置宽高
            height : 96
        });
        qrcode.makeCode("11111");
        document.getElementById("send").onclick =function(){
            qrcode.makeCode(document.getElementById("getval").value);
        }
    }


</script>
</body>
</html>