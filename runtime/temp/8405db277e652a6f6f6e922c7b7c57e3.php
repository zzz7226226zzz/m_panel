<?php /*a:3:{s:77:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\code_list.html";i:1551551562;s:72:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\index\base.html";i:1551511636;s:76:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\component\page.html";i:1550332029;}*/ ?>
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
                <h3 class="uk-card-title">邀请码管理</h3>
            </div>
            <div class="uk-card-body">
                <button class="uk-button uk-button-default" id="code_add">创建邀请码</button>
                <br /><br />
                <button class="uk-button uk-button-default" href="#modal-center" uk-toggle>修改邀请码头</button>
                <div id="modal-center" class="uk-flex-top" uk-modal>
                    <div class="uk-modal-dialog  uk-margin-auto-vertical">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <div class="uk-modal-header">
                            <h2 class="uk-modal-title">修改邀请码头</h2>
                        </div>
                        <div class="uk-modal-body">
                            <div class="uk-margin">
                                <input class="uk-input" type="text" placeholder="1-5位中英文或数字" id="head">
                            </div>
                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary" type="button" id="update_code_head">Save</button>
                        </div>
                    </div>
                </div>
                <a class="uk-link-muted">现在头部：<span id="now_code_head"><?php echo htmlentities($user['code_head']); ?></span></a>
                <div class="uk-margin"></div>
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-striped">
                        <thead>
                            <tr>
                                <th class="uk-table-expand">操作</th>
                                <th>邀请码</th>
                                <th>创建时间</th>
                                <th>状态</th>
                                <th>被邀请人</th>
                            </tr>
                            <tbody>
                                <?php if(is_array($codes) || $codes instanceof \think\Collection || $codes instanceof \think\Paginator): $i = 0; $__LIST__ = $codes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$code): $mod = ($i % 2 );++$i;?>
                                    <tr id="code_<?php echo htmlentities($code['id']); ?>">
                                        <td>
                                            <button class="uk-button uk-button-danger uk-button-small code_delete" code_id="<?php echo htmlentities($code['id']); ?>">删除</button>
                                        </td>
                                        <td><?php echo htmlentities($code['code']); ?></td>
                                        <td><?php echo htmlentities($code['time']); ?></td>
                                        <td>
                                            <?php switch($code['enable']): case "0": ?>已用<?php break; case "1": ?>未用<?php break; ?>
                                            <?php endswitch; ?>
                                        </td>
                                        <td><?php echo htmlentities($code['used']); ?></td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </thead>
                    </table>
                </div>  
                
<ul class="uk-pagination uk-flex-right">
    <?php if($page > 1): ?>
        <li><a href="<?php echo url('mpanel/index/code_manage', ['page'=>($page - 1)]); ?>"><span uk-pagination-previous></span></a></li>
    <?php endif; if(($page - 3) > 1): ?>
        <li><a href="<?php echo url('mpanel/index/code_manage', ['page'=>1]); ?>">1</a></li>
        <?php if(($page - 3) != 2): ?>
            <li class="uk-disabled"><span>...</span></li>
        <?php endif; ?>
    <?php endif; $__FOR_START_2050067695__=$page - 3;$__FOR_END_2050067695__=$page;for($i=$__FOR_START_2050067695__;$i < $__FOR_END_2050067695__;$i+=1){ if($i > 0): ?>
            <li><a href="<?php echo url('mpanel/index/code_manage', ['page'=>$i]); ?>"><?php echo htmlentities($i); ?></a></li>
        <?php endif; } ?>
    <li class="uk-active"><span><?php echo htmlentities($page); ?></span></li>
    <?php $__FOR_START_705791077__=$page + 1;$__FOR_END_705791077__=$page + 4;for($i=$__FOR_START_705791077__;$i < $__FOR_END_705791077__;$i+=1){ if($i <= $count): ?>
            <li><a href="<?php echo url('mpanel/index/code_manage', ['page'=>$i]); ?>"><?php echo htmlentities($i); ?></a></li>
        <?php endif; } if($count > ($page + 3)): if(($page + 3) != ($count - 1)): ?>
            <li class="uk-disabled"><span>...</span></li>
        <?php endif; ?>
        <li><a href="<?php echo url('mpanel/index/code_manage', ['page'=>$count]); ?>"><?php echo htmlentities($count); ?></a></li>
    <?php endif; if($page < $count): ?>
        <li><a href="<?php echo url('mpanel/index/code_manage', ['page'=>($page + 1)]); ?>"><span uk-pagination-next></span></a></li>
    <?php endif; ?>
</ul>
            </div>
            <br />
        </div>
    </div>
    <script>
        (function () {
            $('.code_delete').on('click', function() {
                id = $(this).attr('code_id');
                var request = $.ajax({
                  url: '<?php echo url("mpanel/code/code_delete"); ?>',
                  method: 'POST',
                  data: {id: id},
                  dataType: 'html'
                });
                
                request.done(function(msg) {
                    if(msg == '"LOL"') {
                        $('#code_' + id).remove();
                    } else {
                        write_alert(msg);
                    }
                });
                 
                request.fail(function(jqXHR, textStatus) {
                    write_alert('Request failed: ' + textStatus);
                });
            });

            $('#code_add').on('click', function() {
                var request = $.ajax({
                  url: '<?php echo url("mpanel/code/add"); ?>',
                  method: 'GET',
                  dataType: 'html'
                });
                
                request.done(function(msg) {
                    if(msg == '"LOL"') {
                        location.reload();
                    } else {
                        write_alert(msg);
                    }
                });
                 
                request.fail(function(jqXHR, textStatus) {
                    write_alert('Request failed: ' + textStatus);
                });
            });

            
            $('#update_code_head').on('click', function() {
                head = $('#head').val();
                var request = $.ajax({
                  url: '<?php echo url("mpanel/user/update_code_head"); ?>',
                  method: 'POST',
                  data: {head: head},
                  dataType: 'html'
                });
                
                request.done(function(msg) {
                    if(msg == '"LOL"') {
                        $('#now_code_head').html(head);
                        UIkit.modal('#modal-center').hide();
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