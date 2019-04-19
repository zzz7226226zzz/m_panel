<?php /*a:1:{s:60:"C:\wamp64\www\mpanel\application\mpanel\view\user\login.html";i:1553825745;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <title>MPP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/mpanel/public/css/uikit.min.css" />
        <script src="/mpanel/public/js/jquery.min.js"></script>
        <script src="/mpanel/public/js/uikit.min.js"></script>
        <script src="/mpanel/public/js/uikit-icons.min.js"></script>
        <script src="/mpanel/public/js/common.js"></script>
    </head>
    <body>
        <div class="uk-position-center" uk-grid>
            <div>
                <h3 class="uk-card-title">Login</h3>
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Username" id="username">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="password" placeholder="Password" id="password">
                </div>
                <div class="uk-flex uk-flex-right uk-flex-middle uk-grid-small" uk-grid>
                    <div>
                        <a class="uk-link-muted" href="<?php echo url('mpanel/user/signup');; ?>">Sign up</a>
                    </div>
                    <div>
                        <button class="uk-button uk-button-default" id="login">Login</button>
                    </div>
                </div>
                <div class="uk-margin"></div>
                <div class="uk-flex uk-flex-right">
                    <a class="uk-link-muted" href="<?php echo url('mpanel/user/change_password');; ?>">Forgot password?</a>
                </div>
            </div>
        </div>
    </body>
	<script type="text/javascript">
        (function () {
            $('#login').on('click', function() {
                var username = $( '#username' ).val();
                var password = $( '#password' ).val();
                var request = $.ajax({
                  url: '<?php echo url("mpanel/user/verify_account");; ?>',
                  method: 'POST',
                  data: {username: username, password: password},
                  dataType: 'html'
                });
                
                request.done(function(msg) {
                    if(msg == '"LOL"') {
                        window.location.href="<?php echo url('mpanel/index/index');; ?>"; 
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