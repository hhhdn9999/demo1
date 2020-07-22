<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="?controller=gridiron" method="post">
        <div class="login">
            <div class="login-screen">
                <div class="app-title">
                    <h1 style="margin-bottom: 20px">Login</h1>
                </div>

                <div class="login-form">
                    <div class="control-group">
                    <input name="u" type="text" class="login-field" value="" placeholder="username" id="login-name">
                    <label  class="login-field-icon fui-user" for="login-name"></label>
                    </div>

                    <div class="control-group">
                    <input name="p" type="password" class="login-field" value="" placeholder="password" id="login-pass">
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                    </div>

                    <button class="btn btn-primary btn-large btn-block" type="submit" name="handle_login">Login</button>
                </div>
            </div>
        </div>
    </form>
    <?php
            if(isset($thanhcong) && in_array('login_success', $thanhcong))
            {
                // echo "<p style=\"color: green; text-align: center\">Add Member Success</p>";
                header("Location: ?controller=gridiron&action=list");
            }
    ?>
</body>
</html>
