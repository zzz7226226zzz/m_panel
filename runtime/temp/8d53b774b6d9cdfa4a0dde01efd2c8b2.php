<?php /*a:3:{s:79:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\user_manage.html";i:1551511233;s:72:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\base.html";i:1551511636;s:76:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\component\page.html";i:1550332029;}*/ ?>
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
                <h3 class="uk-card-title">用户管理</h3>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin"></div>
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-striped">
                        <thead>
                            <tr>
                                <th class="uk-table-expand">操作</th>
                                <th>id</th>
                                <th>用户名</th>
                                <th>端口</th>
                                <th>已用流量</th>
                                <th>总流量</th>
                                <th class="uk-table-expand">加密方式</th>
                                <th class="uk-table-expand">链接协议</th>
                                <th class="uk-table-expand">链接参数</th>
                                <th class="uk-table-expand">混淆方式</th>
                                <th class="uk-table-expand">混淆参数</th>
                                <th class="uk-table-expand">状态</th>
                                <th class="uk-table-expand">最近使用日期</th>
                                <th>注册时间</th>
                                <th>注册IP</th>
                                <th class="uk-table-expand">邀请码</th>
                                <th class="uk-table-expand">邀请人id</th>
                            </tr>
                            <tbody>
                                <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                                    <tr id="user_<?php echo htmlentities($user['id']); ?>">
                                        <td>
                                            <a class="uk-button uk-button-primary uk-button-small" href="<?php echo url('mpanel/index/user_edit', ['id'=>$user['id']]);; ?>">编辑</a>
                                            <button class="uk-button uk-button-danger uk-button-small user_delete" user_id="<?php echo htmlentities($user['id']); ?>">删除</button>
                                        </td>
                                        <td><?php echo htmlentities($user['id']); ?></td>
                                        <td><?php echo htmlentities($user['name']); ?></td>
                                        <td><?php echo htmlentities($user['port']); ?></td>
                                        <td><?php echo app\mpanel\controller\Tools::size_to_string($user['u'] + $user['d']); ?></td>
                                        <td><?php echo app\mpanel\controller\Tools::size_to_string($user['transfer_enable']); ?></td>
                                        <td><?php echo htmlentities($user['method']); ?></td>
                                        <td><?php echo htmlentities($user['protocol']); ?></td>
                                        <td><?php echo htmlentities($user['protocol_param']); ?></td>
                                        <td><?php echo htmlentities($user['obfs']); ?></td>
                                        <td><?php echo htmlentities($user['obfs_param']); ?></td>
                                        <td>
                                            <?php switch($user['enable']): case "0": ?>关闭<?php break; case "1": ?>启用<?php break; ?>
                                            <?php endswitch; ?>
                                        </td>
                                        <td><?php echo htmlentities(date('Y-m-d H:i',!is_numeric($user['t'])? strtotime($user['t']) : $user['t'])); ?></td>
                                        <td><?php echo htmlentities($user['reg_date']); ?></td>
                                        <td><?php echo long2ip($user['reg_ip']); ?></td>
                                        <td><?php echo htmlentities($user['reg_code']); ?></td>
                                        <td><?php echo htmlentities($user['reg_by']); ?></td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </thead>
                    </table>
                </div>  
                
<ul class="uk-pagination uk-flex-right">
    <?php if($page > 1): ?>
        <li><a href="<?php echo url('mpanel/index/user_manage', ['page'=>($page - 1)]); ?>"><span uk-pagination-previous></span></a></li>
    <?php endif; if(($page - 3) > 1): ?>
        <li><a href="<?php echo url('mpanel/index/user_manage', ['page'=>1]); ?>">1</a></li>
        <?php if(($page - 3) != 2): ?>
            <li class="uk-disabled"><span>...</span></li>
        <?php endif; ?>
    <?php endif; $__FOR_START_1536800171__=$page - 3;$__FOR_END_1536800171__=$page;for($i=$__FOR_START_1536800171__;$i < $__FOR_END_1536800171__;$i+=1){ if($i > 0): ?>
            <li><a href="<?php echo url('mpanel/index/user_manage', ['page'=>$i]); ?>"><?php echo htmlentities($i); ?></a></li>
        <?php endif; } ?>
    <li class="uk-active"><span><?php echo htmlentities($page); ?></span></li>
    <?php $__FOR_START_1322034880__=$page + 1;$__FOR_END_1322034880__=$page + 4;for($i=$__FOR_START_1322034880__;$i < $__FOR_END_1322034880__;$i+=1){ if($i <= $count): ?>
            <li><a href="<?php echo url('mpanel/index/user_manage', ['page'=>$i]); ?>"><?php echo htmlentities($i); ?></a></li>
        <?php endif; } if($count > ($page + 3)): if(($page + 3) != ($count - 1)): ?>
            <li class="uk-disabled"><span>...</span></li>
        <?php endif; ?>
        <li><a href="<?php echo url('mpanel/index/user_manage', ['page'=>$count]); ?>"><?php echo htmlentities($count); ?></a></li>
    <?php endif; if($page < $count): ?>
        <li><a href="<?php echo url('mpanel/index/user_manage', ['page'=>($page + 1)]); ?>"><span uk-pagination-next></span></a></li>
    <?php endif; ?>
</ul>
            </div>
        </div>
    </div>
    <script>
        (function () {
            $('.user_delete').on('click', function() {
                id = $(this).attr('user_id');
                var request = $.ajax({
                  url: '<?php echo url("mpanel/user/user_delete"); ?>',
                  method: 'POST',
                  data: {id: id},
                  dataType: 'html'
                });
                
                request.done(function(msg) {
                    if(msg == '"LOL"') {
                        $('#user_' + id).remove();
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