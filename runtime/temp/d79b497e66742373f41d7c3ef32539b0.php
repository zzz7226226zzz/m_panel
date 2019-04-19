<?php /*a:2:{s:61:"C:\wamp64\www\mpanel\application\mpanel\view\index\index.html";i:1553825745;s:60:"C:\wamp64\www\mpanel\application\mpanel\view\index\base.html";i:1553825745;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo config('mppdef.sitename');; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/mpanel/public/css/uikit.min.css" />
        <script src="/mpanel/public/js/jquery.min.js"></script>
        <script src="/mpanel/public/js/uikit.min.js"></script>
        <script src="/mpanel/public/js/uikit-icons.min.js"></script>
        <script src="/mpanel/public/js/common.js"></script>
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
                    <li><a href="<?php echo url('mpanel/user/logout');; ?>"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>登出</a></li>
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
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/user/logout');; ?>"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>登出</a></li>
                </ul>
            </div>
            <div class="uk-width-expand uk-padding-remove-left">
                
    <div class="uk-container uk-container-expand">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <h3 class="uk-card-title">公告</h3>
            </div>
            <div class="uk-card-body">
                <ul uk-accordion>
                    <?php if(is_array($annos) || $annos instanceof \think\Collection || $annos instanceof \think\Paginator): $i = 0; $__LIST__ = $annos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$anno): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a class="uk-accordion-title" href="#"><?php echo htmlentities($anno['header']); ?></a>
                            <div class="uk-accordion-content">
                                <p><?php echo htmlentities($anno['text']); ?></p>
                            </div>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="uk-card-footer">
                <a href="<?php echo url('mpanel/index/announcement_list');; ?>" class="uk-button uk-button-text" >更多公告</a>
            </div>
        </div>
        <br />
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <h3 class="uk-card-title">流量</h3>
            </div>
            <div class="uk-card-body">
                <p>本月：<?php echo htmlentities($user['ds']); ?>&nbsp;&nbsp;&nbsp;总流量:<?php echo htmlentities($user['transfer_enables']); ?></p>
                <progress class="uk-progress" value="<?php echo htmlentities($user['d']); ?>" max="<?php echo htmlentities($user['transfer_enable']); ?>"></progress>
            </div>
        </div>
        <br />
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <h3 class="uk-card-title">账号情况</h3>
            </div>
            <div class="uk-card-body">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-expand" uk-leader>可用激活码数量</div>
                    <div><?php echo htmlentities($user['enable_code']); ?></div>
                </div>
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-expand" uk-leader>上次在线时间</div>
                    <div><?php echo htmlentities($user['pox_last_ol']); ?></div>
                </div>
            </div>
        </div><br />
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <h3 class="uk-card-title">修改密码</h3>
            </div>
            <div class="uk-card-body">
                <p>邀请码是你修改密码时的唯一凭证，请确保你永远有办法获取自己的邀请码</p>
                <button class="uk-button uk-button-default" uk-toggle="target: #update_password" type="button">修改密码</button>
                <div id="update_password" class="uk-flex-top" uk-modal>
                        <div class="uk-modal-dialog  uk-margin-auto-vertical">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title">修改</h2>
                            </div>
                            <div class="uk-modal-body">
                                <div class="uk-margin">
                                    <input class="uk-input" type="text" placeholder="邀请码" id="code">
                                </div>
                                <div class="uk-margin">
                                    <input class="uk-input" type="password" placeholder="新密码" id="password">
                                </div>
                            </div>
                            <div class="uk-modal-footer uk-text-right">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-primary" type="button" id="update_pass">Save</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div><script>
            (function () {
                $('#update_pass').on('click', function() {
                    code = $('#code').val();
                    password = $('#password').val();
                    var request = $.ajax({
                      url: '<?php echo url("mpanel/user/update_password"); ?>',
                      method: 'POST',
                      data: {code: code, password: password},
                      dataType: 'html'
                    });
                    
                    request.done(function(msg) {
                        if(msg == '"LOL"') {
                            UIkit.modal('#update_password').hide();
                            write_alert('修改成功');
                        } else {
                            write_alert(msg);
                        }
                    });
                     
                    request.fail(function(jqXHR, textStatus) {
                        write_alert('Request failed: ' + textStatus);
                    });
                });
            }());
        </script>

            </div>
        </div>
    </body>
	<script type="text/javascript">
        (function () {
            
        }());
	</script>
</html>