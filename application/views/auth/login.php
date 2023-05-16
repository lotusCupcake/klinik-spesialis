<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Rizvi">
    <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
    <link rel="shortcut icon" href="uploads/favicon.png">

    <title>Login - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>

    <link rel="stylesheet" href="template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/node_modules/@fortawesome/fontawesome-free/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="template/node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="template/node_modules/selectric/public/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="template/assets/css/style.css">
    <link rel="stylesheet" href="template/assets/css/components.css">
</head>

<body>

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand mb-5">
                            <img src="uploads/logo-klinik-spesialis.PNG" alt="logo" width="250">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted"><?php echo $message; ?></p>
                                <form action="auth/login" method="post">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="text" class="form-control" name="identity" placeholder="User Email" tabindex="1">
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="#" class="text-small" data-toggle="modal" data-target="#myModal">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; 2023 UMSU
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forgot Password ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="auth/forgot_password" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Enter your e-mail address below to reset your password.</label>
                            <input name="email" type="text" class="form-control" placeholder="Email" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="template/node_modules/moment/min/moment.min.js"></script>
    <script src="template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="template/node_modules/selectric/public/jquery.selectric.min.js"></script>

    <!-- Template JS File -->
    <script src="template/assets/js/scripts.js"></script>
    <script src="template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="template/assets/js/page/auth-register.js"></script>
</body>

</html>