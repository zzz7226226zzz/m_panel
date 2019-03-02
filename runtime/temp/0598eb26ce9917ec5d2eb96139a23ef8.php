<?php /*a:2:{s:76:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\node_add.html";i:1550318965;s:72:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\base.html";i:1550320024;}*/ ?>
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
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/user_list');; ?>">用户管理</a></li>
                    <?php endif; ?>
                    <li class="uk-nav-divider"></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">个人中心</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">节点列表</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">邀请管理</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">软件下载</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">问题反馈</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>登出</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-margin"></div>
        <div class="uk-margin-remove-left" uk-grid>
            <div class="uk-card uk-card-body uk-width-small uk-visible@m">
                <ul class="uk-nav-default uk-nav-center" uk-nav>  
                    <?php if($invite == 0): ?>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/announcement_manage');; ?>">公告管理</a></li>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">节点管理</a></li>
                        <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/user_list');; ?>">用户管理</a></li>
                        <li class="uk-nav-divider"></li>
                    <?php endif; ?>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">个人中心</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">节点列表</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">邀请管理</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">软件下载</a></li>
                    <li><a class="uk-button uk-button-text" href="<?php echo url('mpanel/index/node_manage');; ?>">问题反馈</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a class="uk-button uk-button-text" href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>登出</a></li>
                </ul>
            </div>
            <div class="uk-card uk-card-default uk-width-expand">
                
    <div class="uk-container uk-container-expand">
        <div class="uk-card">
            <div class="uk-card-header">
                <h3 class="uk-card-title">节点添加</h3>
            </div>
            <div class="uk-card-body">
                <div class="uk-form-horizontal uk-margin-large">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">节点名称</label><span class="uk-label uk-label-danger form_label" id="name_label"></span>
                        <input class="uk-input" type="text" name="name" placeholder="例：美国节点1" id="name">
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">节点地址</label><span class="uk-label uk-label-danger form_label" id="server_label"></span>
                        <input class="uk-input" type="text" name="server" placeholder="域名或ip" id="server">
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">节点ip</label><span class="uk-label uk-label-danger form_label" id="ip_label"></span>
                        <input class="uk-input" type="text" name="ip" placeholder="不填则自动获取" id="ip">
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">节点介绍</label><span class="uk-label uk-label-danger form_label" id="info_label"></span>
                        <input class="uk-input" type="text" name="info" placeholder="节点信息描述" id="info">
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">节点状态</label><span class="uk-label uk-label-danger form_label" id="enable_label"></span>
                        <div class="uk-form-controls uk-form-controls-text">
                            <label><input class="uk-radio" type="radio" value="1" name="enable" checked="true">启用</label><br>
                            <label><input class="uk-radio" type="radio" value="0" name="enable">关闭</label>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">流量比率</label><span class="uk-label uk-label-danger" id="traffic_rate_label"></span>
                        <input class="uk-input" type="num" name="traffic_rate" placeholder="用户实际使用流量与服务器统计流量的比例，默认为1" id="traffic_rate">
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">节点排序</label><span class="uk-label uk-label-danger" id="sort_label"></span>
                        <input class="uk-input" type="num" name="sort" placeholder="前后台显示顺序，0-99的数字，默认为0" id="sort">
                    </div>
                    <div class="uk-card-footer">
                        <div class="uk-flex uk-flex-right uk-flex-middle uk-grid-small" uk-grid>
                            <div>
                                <button class="uk-button uk-button-default" id="add">添加</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function () {
            $('#add').on('click', function() {
                var name = $('#name').val();
                var server = $('#server').val();
                var ip = $('#ip').val();
                var info = $('#info').val();
                var enable = $("input[name='enable']:checked").val();
                var traffic_rate = $('#traffic_rate').val();
                var sort = $('#sort').val();
                $(".form_label").html("");
                var request = $.ajax({
                url: '<?php echo url("mpanel/node/update");; ?>',
                method: 'POST',
                data: {name: name, server: server, ip: ip, info: info, enable: enable, traffic_rate: traffic_rate, sort: sort},
                dataType: 'html'
                });
                
                request.done(function(msg) {
                    if(msg =='"LOL"') {
                        window.location.href="<?php echo url('mpanel/index/node_manage');; ?>"; 
                    } else {
                        msg = $.parseJSON(msg);
                        if(msg instanceof Array) {
                            msg.forEach(function(e) {
                                $("#" + e['key'] + "_label").html(e['error']);
                            });
                        } else {
                            write_alert('Request failed: '+ textStatus);
                        }
                    }
                });
                
                request.fail(function(jqXHR, textStatus) {
                    write_alert('Request failed: '+ textStatus);
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