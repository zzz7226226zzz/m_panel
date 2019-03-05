<?php /*a:1:{s:70:"C:\wamp64\www\mpanel\application\mpanel\view\user\change_password.html";i:1551753817;}*/ ?>
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
        <div class="uk-position-center" uk-grid>
            <div>
                <h3 class="uk-card-title">Change&nbsp;Password</h3>
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Code" id="code">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="password" placeholder="Password" id="password">
                </div>
                <div class="uk-flex uk-flex-right uk-flex-middle uk-grid-small" uk-grid>
                    <div>
                        <button class="uk-button uk-button-default" id="change_password">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
	<script type="text/javascript">
        (function () {
            $('#change_password').on('click', function() {
                var code = $( '#code' ).val();
                var password = $( '#password' ).val();
                var request = $.ajax({
                  url: '<?php echo url("mpanel/user/update_password");; ?>',
                  method: 'POST',
                  data: {code: code, password: password},
                  dataType: 'html'
                });
                
                request.done(function(msg) {
                    if(msg == '"LOL"') {
                        write_alert('修改成功');
                        window.location.href="<?php echo url('mpanel/user/login');; ?>"; 
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
</html>