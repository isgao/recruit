<!DOCTYPE HTML>
<html>
<head>
    <script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate" media="handheld"  />
    <!-- end 云适配 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>@yield('title')</title>
    <meta property="qc:admins" content="23635710066417756375" />
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

    <!-- <div class="web_root"  style="display:none">h</div> -->
    <script type="text/javascript">
    var ctx = "h";
    </script>
    <link rel="Shortcut Icon" href="h/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/css/external.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/css/popup.css"/>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css"/>
    
    <script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="style/js/jquery.lib.min.js"></script>
    <script src="style/js/ajaxfileupload.js" type="text/javascript"></script>
    <script type="text/javascript" src="style/js/additional-methods.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/artTemplate.js"></script>
    <!--[if lte IE 8]>
        <script type="text/javascript" src="style/js/excanvas.js"></script>
    <![endif]-->
    <!-- <script type="text/javascript">
    var youdao_conv_id = 271546; 
    </script> 
    <script type="text/javascript" src="style/js/conv.js"></script> -->
</head>
<body>
    @include('sweet::alert')
    <div id="body">
        <!-- start #header -->
    	<div id="header">
        	<div class="wrapper">
        		<a href="index.html" class="logo">
        			<img src="style/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
        		</a>
        		<ul class="reset" id="navheader">
        			<li class="current"><a href="index.html">首页</a></li>
        			<li ><a href="companylist.html" >公司</a></li>
        			<li ><a href="#" target="_blank">论坛</a></li>
        				    			<li ><a href="jianli" rel="nofollow">我的简历</a></li>
    	    							    			<li ><a href="create.html" rel="nofollow">发布职位</a></li>
                </ul>
                <ul class="loginTop">
            @if(session('username')=='')
                        <li><a href="login" rel="nofollow">
                                登陆</a></li>
                        <li>|</li>
                        <li><a href="reg" rel="nofollow">注册</a></li>
                        <li><a href="javascript:login_in();" rel="nofollow">快速登录</a></li>
                        
            @else
                	<li><a rel="nofollow">欢迎
                            {{session('username')}}
                            登陆</a></li>
                	<li>
                    <li>
                        <a href="exit">退出</a>
                    </li>
            @endif
                </ul>
            </div>
        </div>
        <!-- end #header -->
        

        <div id="container">
            @yield('content')
            <!--<div id="qrSide"><a></a></div> -->
            <!--<div id="loginToolBar">
                <div>
                    <em></em>
                    <img src="style/images/footbar_logo.png" width="138" height="45" />
                    <span class="companycount"></span>
                    <span class="positioncount"></span>
                    <a href="#loginPop" class="bar_login inline" title="登录"><i></i></a>
                    <div class="right">
                        <a href="register.html?from=index_footerbar" onclick="_hmt.push(['_trackEvent', 'button', 'click', 'register'])" class="bar_register" id="bar_register" target="_blank"><i></i></a>
                    </div>
                    <input type="hidden" id="cc" value="16002" />
                    <input type="hidden" id="cp" value="96531" />
                </div>
            </div>-->

    <!------------------------------弹窗lightbox  ------------------------------------------>
    <script type="text/html" id="loginBlock">
        <!-- 登录框 -->
            <div>
                <span>使用QQ/微博帐号直接登录:</span>
                <a href="h/ologin/auth/sina.html" target="_blank" id="icon_wb" class="icon_wb" title="使用新浪微博帐号登录"></a>
                <a href="<?php echo action('SimpleController@qq')?>" class="icon_qq" id="icon_qq" target="_blank" title="使用腾讯QQ帐号登录" ></a>
            </div>
    </script>
            <!------------------------------lightbox end-------------------------------------------->
            <script type="text/javascript" src="style/js/Chart.min.js"></script>
            <script type="text/javascript" src="style/js/home.min.js"></script>
            <script type="text/javascript" src="style/js/count.js"></script>
            <div class="clear"></div>
            <input type="hidden" id="resubmitToken" value="" />
            <a id="backtop" title="回到顶部" rel="nofollow"></a>
        </div>

        <div id="footer">
            <div class="wrapper">
                <a href="h/about.html" target="_blank" rel="nofollow">联系我们</a>
                <a href="h/af/zhaopin.html" target="_blank">互联网公司导航</a>
                <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
                <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
                <div class="copyright">&copy;2013-2014 Lagou <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action">京ICP备14023790号-2</a></div>
            </div>
        </div>

        <script type="text/javascript" src="style/js/core.min.js"></script>
        <script type="text/javascript" src="style/js/popup.min.js"></script>

    </body>
    <script type="text/javascript">
        function login_in()
        {
            var list = {};
            var _html = template('loginBlock',list);
            console.log(_html);
            swal({
                title: "快速登录",
                text: _html,
                animation: "slide-from-top",
                html: true,
            })
        }
    </script>
</html>