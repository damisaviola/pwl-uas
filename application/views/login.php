<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .login-container {
            margin-top: 10%;
        }
        .panel-login {
            border-color: #ccc;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .panel-heading {
            background-color: #f5f5f5;
            border-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 login-container">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Admin</h3>
                    </div>
                    <div class="panel-body">
                        <form id="login-form" action="<?php echo base_url('index.php/admin/process_login'); ?>" method="post" role="form">
                            <div class="form-group">
                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $this->session->flashdata('username'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group text-center">
                                <button type="button" class="btn btn-primary btn-block" onclick="validateForm()">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (username.trim() === '' || password.trim() === '') {
                alert('Username dan password tidak boleh kosong');
            } else {
                document.getElementById('login-form').submit();
            }
        }
    </script>

</body>
</html>
