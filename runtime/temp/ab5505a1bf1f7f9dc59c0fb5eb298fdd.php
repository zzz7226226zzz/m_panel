<?php /*a:2:{s:76:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\download.html";i:1551551160;s:72:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\base.html";i:1551511636;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo config('mppdef.sitename');; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/site/public/css/uikit.min.css" />
        <script src="/site/public/js/jquery.min.js"></script>
        <script src="/site/public/js/uikit.min.js"></script>
        <script src="/site/public/js/uikit-icons.min.js"></script>
        <script src="/site/public/js/common.js"></script>
    </head>
    <body>
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <nav class="uk-navbar-container uk-container uk-container-expand uk-light" uk-navbar style="position: relative; z-index: 980; background: black">
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo" href="<?php echo url('mpanel/index/index');; ?>" style="color:white"><?php echo config('mppdef.sitename');; ?></a>
                </div>
                <div class="uk-navbar-right">
                    <a class="uk-navbar-toggle uk-visible@m" style="color: white">当前用户：<?php echo htmlentities($username); ?></a>
                    <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon uk-toggle="target: #hidden_menu" href="#"></a>
                </div>
            </nav>
        </div>
        <div id="hidden_menu" uk-offcanvas="overlay: true; flip: true">
            <div class="uk-offcanvas-bar uk-flex uk-flex-column">
                <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                    <li><a><?php echo htmlentities($username); ?></a></li>
                    <?php if($invite == 0): ?>
                        <li class="uk-nav-divider"></li>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/announcement_manage');; ?>">公告管理</a></li>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">节点管理</a></li>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/user_manage');; ?>">用户管理</a></li>
                    <?php endif; ?>
                    <li class="uk-nav-divider"></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/index');; ?>">个人中心</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_list');; ?>">节点列表</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/code_list');; ?>">邀请管理</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/download');; ?>">软件下载</a></li>
                    <li><a class="uk-button uk-button-text" href="tencent://Message/?Uin=952257494&websiteName=q-zone.qq.com&Menu=yes">问题反馈</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>登出</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-margin"></div>
        <div class="uk-margin-remove-left" uk-grid>
            <div class="uk-card uk-width-small uk-visible@m">
                <ul class="uk-nav-default uk-nav-center" uk-nav>  
                    <?php if($invite == 0): ?>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/announcement_manage');; ?>">公告管理</a></li>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">节点管理</a></li>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/user_manage');; ?>">用户管理</a></li>
                        <li class="uk-nav-divider"></li>
                    <?php endif; ?>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/index');; ?>">个人中心</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_list');; ?>">节点列表</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/code_list');; ?>">邀请管理</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/download');; ?>">软件下载</a></li>
                    <li><a class="uk-button uk-button-text" href="tencent://Message/?Uin=952257494&websiteName=q-zone.qq.com&Menu=yes">问题反馈</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a class="uk-button uk-button-text" href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>登出</a></li>
                </ul>
            </div>
            <div class="uk-width-expand uk-padding-remove-left">
                
    <div class="uk-container uk-container-expand">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <h3 class="uk-card-title">软件下载</h3>
            </div>
            <div class="uk-card-body">
                <ul uk-accordion> 
                    <li>
                        <a class="uk-accordion-title" href="#">ShadowSocksR与ShadowSocks的区别</a>
                        <div class="uk-accordion-content">
                            <p>ShadowSocksR多了一个混淆(obfs)功能，可以将访问地址伪装为别的网站，（有可能？）会提升一定的安全性，速度比ShadowSocks要慢一点（但是影响不大，速度主要还是取决于节点线路）</p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title" href="#">Windows</a>
                        <div class="uk-accordion-content">
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade connect: .switcher-container">
                                <li><a href="#">ShadowSocksR</a></li>
                                <li><a href="#">ShadowSocks</a></li>
                            </ul>
                            
                            <ul class="uk-switcher uk-margin switcher-container">
                                <li>
                                    <a class="uk-button uk-button-default" href="/site/public/software/pcssr.7z" target="view_window">下载</a>
                                </li>
                                <li>
                                    <a class="uk-button uk-button-default" href="/site/public/software/pcss.rar" target="view_window">下载</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title" href="#">Android</a>
                        <div class="uk-accordion-content">
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade connect: .switcher-container">
                                <li><a href="#">ShadowSocksR</a></li>
                                <li><a href="#">ShadowSocks</a></li>
                            </ul>
                            
                            <ul class="uk-switcher uk-margin switcher-container">
                                <li>
                                    <a class="uk-button uk-button-default" href="/site/public/software/ssr.apk" target="view_window">下载</a>
                                </li>
                                <li>
                                    <a class="uk-button uk-button-default" href="/site/public/software/ss.apk" target="view_window">下载</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title" href="#">IOS</a>
                        <div class="uk-accordion-content">
                                <p>国区大多软件都被下架，站长也没有苹果手机做测试，下面的软件仅供参考，如果有美服账号，推荐使用Shadowrocket</p>
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade connect: .switcher-container">
                                <li><a href="#">ShadowSocksR</a></li>
                                <li><a href="#">ShadowSocks</a></li>
                            </ul>
                            
                            <ul class="uk-switcher uk-margin switcher-container">
                                <li>
                                    <a class="uk-button uk-button-default" href="https://itunes.apple.com/cn/app/id1260141606" target="view_window">下载</a>
                                </li>
                                <li>
                                    <a class="uk-button uk-button-default" href="https://itunes.apple.com/cn/app/id1260141606" target="view_window">下载</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title" href="#">MAC</a>
                        <div class="uk-accordion-content">
                            <p>站长没有MAC，只能贴两个github链接了</p>
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade connect: .switcher-container">
                                <li><a href="#">ShadowSocksR</a></li>
                                <li><a href="#">ShadowSocks</a></li>
                            </ul>
                            
                            <ul class="uk-switcher uk-margin switcher-container">
                                <li>
                                    <a class="uk-button uk-button-default" href="https://github.com/ShadowsocksR-Live/ssrMac" target="view_window">下载</a>
                                </li>
                                <li>
                                    <a class="uk-button uk-button-default" href="https://github.com/yangfeicheung/Shadowsocks-X" target="view_window">下载</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

            </div>
        </div>
    </body>
	<script type="text/javascript">
        (function () {
            
        }());
	</script>
</html>