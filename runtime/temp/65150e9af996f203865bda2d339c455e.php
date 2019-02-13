<?php /*a:2:{s:65:"C:\wamp64\www\site\application\mpanel\view\index\node_manage.html";i:1550051754;s:58:"C:\wamp64\www\site\application\mpanel\view\index\base.html";i:1550051535;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <title>MPP</title>
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
                    <a class="uk-navbar-toggle  uk-visible@m" uk-icon="icon: user; ratio: 1.5"></a>
                    <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon uk-toggle="target: #hidden_menu" href="#"></a>
                </div>
            </nav>
        </div>
        <div id="hidden_menu" uk-offcanvas="overlay: true; flip: true">
            <div class="uk-offcanvas-bar uk-flex uk-flex-column">
                <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                    <?php if($invite == 0): ?>
                        <li class="uk-nav-divider"></li>
                        <li><a href="<?php echo url('mpanel/index/node_manage');; ?>">节点管理</a></li>
                        <li><a href="<?php echo url('mpanel/index/announcement_manage');; ?>">公告管理</a></li>
                        <li><a href="<?php echo url('mpanel/index/user_list');; ?>">用户列表</a></li>
                    <?php endif; ?>
                    <li class="uk-nav-divider"></li>
                    <li><a href="<?php echo url('mpanel/index/node_manage');; ?>">个人中心</a></li>
                    <li><a href="<?php echo url('mpanel/index/node_manage');; ?>">节点列表</a></li>
                    <li><a href="<?php echo url('mpanel/index/node_manage');; ?>">邀请管理</a></li>
                    <li><a href="<?php echo url('mpanel/index/node_manage');; ?>">软件下载</a></li>
                    <li><a href="<?php echo url('mpanel/index/node_manage');; ?>">问题反馈</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>登出</a></li>
                </ul>
            </div>
        </div>
        
    <div class="uk-card">
        <div class="uk-card-header">
            <h3 class="uk-card-title"></h3>
        </div>
        <div class="uk-card-body"></div>
        <div class="uk-card-footer"></div>
    </div>

    </body>
	<script type="text/javascript">
        (function () {
            
        }());
	</script>
</html>