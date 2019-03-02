<?php /*a:1:{s:73:"F:\phpstudy\PHPTutorial\WWW\site\application\mpanel\view\user\signup.html";i:1551526919;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign up</title>
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
                <h3 class="uk-card-title">Sign up</h3>
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="username" placeholder="Username" id="username">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="password" name="password" placeholder="Password" id="password">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="password" name="repassword" placeholder="RePassword" id="repassword">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="code" placeholder="Code" id="code">
                </div>
                <div class="uk-flex uk-flex-right uk-flex-middle uk-grid-small" uk-grid>
                    <div>
                        <button id="signup" class="uk-button uk-button-default">Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
	<script type="text/javascript">
        (function () {
            $('#signup').on('click', function() {
                var username = $( '#username' ).val();
                var password = $( '#password' ).val();
                var repassword = $( '#repassword' ).val();
                var code = $( '#code' ).val();
                var request = $.ajax({
                  url: '<?php echo url("mpanel/user/register");; ?>',
                  method: 'POST',
                  data: {username: username, password: password, repassword: repassword, code: code},
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