
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ngobatin - Login</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= base_url('images/logo.png'); ?>">
    <link rel="shortcut icon" href="<?= base_url('images/logo.png'); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend/css/cs-skin-elastic.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/backend/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/style.css'); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 bg-red">
                    <div class="box">
                    </div>
                </div>
                <div class="col-md-7" style="margin-top: 50px;">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1 class="text-dark"><img class="align-content" src="<?= base_url('images/logo.png'); ?>" alt=""> Ngobatin</h1>
                            </a>
                        </div>
                        <div class="login-form p-5 ml-auto mr-auto col-lg-10 col-md-12">      
                            <?= form_error('email', '<div class="alert alert-warning" role="alert"><small class="text-danger pl-3">', '</small></div>'); ?>
                            <form class="user" method="post" action="<?php echo site_url('admin/user/login/'); ?>">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="text-right">
                                    <input type="submit" name="submit" value="Login" class="button button__primary mt-4">
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="<?= site_url('admin/user/register'); ?>"> Sign Up Here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>s
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?= base_url('assets/backend/js/main.js'); ?>"></script>

</body>
</html>
