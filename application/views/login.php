<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url(); ?>"><b> InstaApp</b><br>Login</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"> </p>

            <form id="loginform" action="<?php echo base_url(); ?>auth/login" method="post">
                <div class="form-group has-feedback">
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" onclick="showPass()"> Show Password
                        </label>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <span id="message">
                        <?php
                        if(isset($message)){
                            echo $message;
                        }                        
                        ?>
                    </span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button id="buttonsubmit" type="button" class="btn bg-black btn-block btn-flat" onclick="loginhandle()" on>Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <br>
            <p>Tidak punya akun, <a href="<?php echo base_url(); ?>auth/register"> Register di sini</a></p>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.0 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <script>
        function loginhandle() {
            if (document.getElementById("username").value == "") {
                document.getElementById("message").innerHTML = "<code>Please, fill the Username</code>";
                return
            }

            if (document.getElementById("password").value == "") {
                document.getElementById("message").innerHTML = "<code>Please, fill the Password</code>";
                return
            }

            document.getElementById("loginform").submit();
        }

        function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        $(document).ready(function() {
            $('#password').keypress(function(e) {
                if (e.keyCode == 13)
                    $('#buttonsubmit').click();
            });
        });
    </script>

</body>

</html>