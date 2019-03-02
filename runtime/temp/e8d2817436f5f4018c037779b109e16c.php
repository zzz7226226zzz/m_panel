<?php /*a:2:{s:77:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\node_list.html";i:1551528060;s:72:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\base.html";i:1551511636;}*/ ?>
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
                
    <style>
        .qrcode {
            width:180px;
            height:180px;
        } 
    </style>
    <div class="uk-container uk-container-expand">
        <div class="uk-card uk-card-default">
            
            <div class="uk-card-header">
                <h3 class="uk-card-title">节点列表</h3>
            </div>
            <div class="uk-card-body">
                <ul uk-accordion>
                    <?php if(is_array($nodes) || $nodes instanceof \think\Collection || $nodes instanceof \think\Paginator): $i = 0; $__LIST__ = $nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$node): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a class="uk-accordion-title" href="#"><?php echo htmlentities($node->name); ?></a>
                        <div class="uk-accordion-content">
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade connect: .switcher-container">
                                <li><a href="#">ShadowSocksR</a></li>
                                <li><a href="#">ShadowSocks</a></li>
                            </ul>
                            
                            <ul class="uk-switcher uk-margin switcher-container">
                                <li>
                                    <a class="uk-button uk-button-default" href='<?php echo htmlentities($node['SSRlink']); ?>'>安装好软件的手机用户请点我</a>
                                    <a class="uk-link-muted" href='<?php echo url('mpanel/index/download');; ?>'>我需要软件</a>
                                </li>
                                <li>
                                    <a class="uk-button uk-button-default" href='<?php echo htmlentities($node['SSlink']); ?>'>安装好软件的手机用户请点我</a>
                                    <a class="uk-link-muted" href='<?php echo url('mpanel/index/download');; ?>'>我需要软件</a>
                                </li>
                            </ul>

                            <p>电脑用户请<a class="uk-link-muted" href='<?php echo url('mpanel/index/download');; ?>'>下载软件</a>，启动后右键点击小飞机图标，选择扫描二维码。<a class="uk-link-muted" uk-toggle="target: #toggle-usage; animation: uk-animation-fade">扫描不成功？</a></p>
                            <p id="toggle-usage" hidden>请保下面的证二维码没有被遮挡，并保持二维码在屏幕中央，若仍然失败，请右键[安装好软件的手机用户请点我]的按钮，复制链接地址，右键小飞机图标，选择从剪切板导入</p>
                            <ul class="uk-switcher uk-margin switcher-container">
                                <li><div id="ssr<?php echo htmlentities($node['id']); ?>" class="qrcode"></div></li>
                                <li><div id="ss<?php echo htmlentities($node['id']); ?>" class="qrcode"></div></li>
                            </ul>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="/site/public/js/qrcode.min.js"></script>
    <script>
        $(function() {
            <?php if(is_array($nodes) || $nodes instanceof \think\Collection || $nodes instanceof \think\Paginator): $i = 0; $__LIST__ = $nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$node): $mod = ($i % 2 );++$i;?>
                new QRCode(document.getElementById("ssr<?php echo htmlentities($node->id); ?>"), "<?php echo htmlentities($node->SSRlink); ?>");
                new QRCode(document.getElementById("ss<?php echo htmlentities($node->id); ?>"), "<?php echo htmlentities($node->SSlink); ?>");
            <?php endforeach; endif; else: echo "" ;endif; ?>
        })
    </script>

            </div>
        </div>
    </body>
	<script type="text/javascript">
        (function () {
            
        }());
	</script>
</html>