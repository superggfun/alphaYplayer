# 修改说明
原作者：京都一只喵

# 播放器说明
播放器可以播放mp3、mp4、flv、m3u8等常见格式，不支持MP4 H265格式的视频。
![播放中](https://cdn.jsdelivr.net/gh/superggfun/alphaYplayer/screenshot/playing.png)
![加载](https://cdn.jsdelivr.net/gh/superggfun/alphaYplayer/screenshot/playLoading.png)
![登录](https://cdn.jsdelivr.net/gh/superggfun/alphaYplayer/screenshot/login.png)
![播放中](https://cdn.jsdelivr.net/gh/superggfun/alphaYplayer/screenshot/admin.png)

# 使用方法
1. 请使用 PHP7.X版本，并在 PHP7.4 环境测试通过。请勿使用PHP8.X版本，在这个版本中可能会运行失败！
2. 解压到网站根目录
3. 登录  你的域名/dmku 进行配置数据库  （网页链接）
4. 修改播放器后台密码  dmku/config.inc.php（请注意这里不是网页链接，是在电脑文件夹里修改）
5. 登录后台 你的域名/admin  密码为第3步修改的密码 （网页链接）
6. 设置播放器的后台功能

# 参数说明（player/index.php）
``` 
"av":'<?php echo($_GET['av']);?>',//B站av号，用于调用弹幕
"url":"<?php echo($_GET['url']);?>",//视频链接
"id":"<?php echo($_GET['url']);?>",//视频id
"sid":"<?php echo($_GET['sid']);?>",//集数id
"pic":"<?php echo($_GET['pic']);?>",//视频封面
"title":"<?php echo($_GET['name']);?>",//视频标题
"next":"<?php echo($_GET['next']);?>",//下一集链接
"user": '<?php echo($_GET['user']);?>',//用户名
"group": "<?php echo($_GET['group']);?>",//用户组
```
# 请求示例
播放器：https://localhost/player/?url=你的视频地址这样就可以播放视频了。

测试mp4：https://localhost/player/?url=http://vfx.mtime.cn/Video/2019/03/19/mp4/190319222227698228.mp4

测试m3u8：https://test.y-alpha.com/player/?url=https://vod1.bdzybf7.com/20220226/9KUhKiAs/index.m3u8

#### 高级
除了 url 参数，其他都可以省略

http://localhost/player/?url=https://cdn.jsdelivr.net/gh/xxx/Video-Bed/Your.Name/playlist.m3u8&next=https://cdn.jsdelivr.net/gh/xxx/Video-Bed/Your.Name/playlist.m3u8&sid=1&pic=https://img.xx.com/1.png&user=游客&group=1&name=测试

# 感谢
感谢uihp大佬对我修改的支持。
