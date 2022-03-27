<?php 
$url = $_GET['url'];
if (empty($url)) {
        exit('<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
        <meta name="robots" content="noarchive">
        <title>AlphaY播放器</title>
        <link rel="shortcut icon" href="img/alphay.ico" type="image/x-icon">
        <style>
        h1{color:#FF00FF; text-align:center; font-family: Microsoft Jhenghei;}p{color:#FF00FF; font-size: 1.2rem;text-align:center;font-family: Microsoft Jhenghei;}
        </style>
        </head>
        <body style="background: #FFFFFF url(https://tenapi.cn/acg) no-repeat fixed center;">
        <table width="100%" height="100%" align="center"><tbody><tr>
        <td align="center">
        <h1><b>AlphaY播放器<br><h1>您好像没有输入视频链接地址哦</h1><p>支持mp3、mp4、flv和m3u8的直链播放<br>不以盈利为目的使用本接口造成的任何后果概不负责</p><p><font size="2"><br>所有资源均来源第三方资源，并不提供影片资源存储，也不参与录制、上传相关视频，视频版权归属其合法持有人所有<br>本站不对使用者的行为负担任何法律责任。如果有因为本站而导致您的权益受到损害，请与我们联系，我们将理性对待，协助你解决相关问题。</font></p></b></h1></td></tr></tbody></table>
        </body>
        </html>');
        }

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>AlphaY播放器</title>
    <link rel="shortcut icon" href="img/alphay.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/alphaYplayer.css">
    <style>
        .alphaYplayer-full-icon span svg,
        .alphaYplayer-fulloff-icon span svg {
            display: none;
        }

        .alphaYplayer-full-icon span,
        .alphaYplayer-fulloff-icon span {
            background-size: contain !important;
            float: left;
            width: 22px;
            height: 22px;
        }

        .alphaYplayer-full-icon span {
            background: url(https://cdn.jsdelivr.net/gh/IMGRU/IMG/2020/05/24/5eca627664041.png) center no-repeat;
        }

        .alphaYplayer-fulloff-icon span {
            background: url(https://cdn.jsdelivr.net/gh/IMGRU/IMG/2020/05/24/5eca6278b7137.webp) center no-repeat;
        }

        #loading-box {
            background: #<?php echo ($_GET['color']); ?> !important;
        }

        #vod-title {
            overflow: unset;
            width: 285px;
            white-space: normal;
            color: #fb7299;
        }

        #vod-title e {
            padding: 2px;
        }

        .layui-layer-dialog {
            text-align: center;
            font-size: 16px;
            padding-bottom: 10px;
        }

        .layui-layer-btn.layui-layer-btn- {
            padding: 15px 5px !important;
            text-align: center;
        }

        .layui-layer-btn a {
            font-size: 12px;
            padding: 0 11px !important;
        }

        .layui-layer-btn a:hover {
            border-color: #00a1d6 !important;
            background-color: #00a1d6 !important;
            color: #fff !important;
        }

        .alphaYplayer-controller .alphaYplayer-icons .alphaYplayer-toggle input+label.checked:after {
            left: 17px;
        }

        .alphaYplayer-setting-jlast:hover #jumptime,
        .alphaYplayer-setting-jfrist:hover #fristtime {
            display: block;
            outline-style: none
        }

        #player_pause .tip {
            color: #f4f4f4;
            position: absolute;
            font-size: 14px;
            background-color: hsla(0, 0%, 0%, 0.42);
            padding: 2px 4px;
            margin: 4px;
            border-radius: 3px;
            right: 0;
        }

        #player_pause {
            position: absolute;
            z-index: 9999;
            top: 50%;
            left: 50%;
            border-radius: 5px;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            max-width: 80%;
            max-height: 80%;
        }

        #player_pause img {
            width: 100%;
            height: 100%;
        }

        #jumptime::-webkit-input-placeholder,
        #fristtime::-webkit-input-placeholder {
            color: #ddd;
            opacity: .5;
            border: 0;
        }

        #jumptime::-moz-placeholder {
            color: #ddd;
        }

        #jumptime:-ms-input-placeholder {
            color: #ddd;
        }

        #jumptime,
        #fristtime {
            width: 50px;
            border: 0;
            background-color: #414141;
            font-size: 12px;
            padding: 3px 3px 3px 3px;
            margin: 2px;
            border-radius: 12px;
            color: #fff;
            position: absolute;
            left: 5px;
            top: 3px;
            display: none;
            text-align: center;
        }

        #link {
            display: inline-block;
            width: 100px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            font-size: 14px;
            border-radius: 22px;
            margin: 0px 10px;
            color: #fff;
            overflow: hidden;
            box-shadow: 0px 2px 3px rgba(0, 0, 0, .3);
            background: rgb(0, 161, 214);
            position: absolute;
            z-index: 9999;
            top: 20px;
            right: 35px;
        }

        #close c {
            float: left;
            display: none;
        }

        .dmlink,
        .playlink,
        .palycon {
            float: left;
            width: 400px;
        }

        #link3-error {
            display: none;
        }
    </style>
    <script src="js/alphaYplayer.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/setting.js"></script>
    <?php
    if (strpos($url, 'm3u8')) {
        echo '<script src="js/hls.min.js"></script>';
    } elseif (strpos($url, 'flv')) {
        echo '<script src="js/flv.min.js"></script>';
    }
    ?>
    <script src="js/layer.js"></script>

    <script>
        var css = '<style type="text/css">';
        var d, s;
        d = new Date();
        s = d.getHours();
        if (s < 17 || s > 23) {
            css += '#loading-box{background: #fff;}'; //白天
        } else {
            css += '#loading-box{background: #000;}'; //晚上
        }
        css += '</style>';
        //$('head').append(css).addClass("");
    </script>
</head>

<body>
    <div id="player"></div>
    <div id="ADplayer"></div>
    <div id="ADtip"></div>
    <script>
        var up = {
            "usernum": "<?php include("tj.php"); ?>", //在线人数
            "mylink": "/player/?url=", //播放器路径，用于下一集
            "diyid": [0, '游客', 1] //自定义弹幕id
        }
        var config = {
            "api": '/dmku/', //弹幕接口
            "av": '<?php echo ($_GET['av']); ?>', //B站弹幕id 45520296
            "url": "<?php echo ($_GET['url']); ?>", //视频链接
            "id": "<?php echo (substr(md5($_GET['url']), -20)); ?>", //视频id
            "sid": "<?php echo ($_GET['sid']); ?>", //集数id
            "pic": "<?php echo ($_GET['pic']); ?>", //视频封面
            "title": "<?php echo ($_GET['name']); ?>", //视频标题
            "next": "<?php echo ($_GET['next']); ?>", //下一集链接
            "user": '<?php echo ($_GET['user']); ?>', //用户名
            "group": "<?php echo ($_GET['group']); ?>" //用户组
        }
        YZM.start()
    </script>
</body>

</html>