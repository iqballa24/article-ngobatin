<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ngobatin - admin</title>
    <meta name="description" content="Ngobatin - admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= base_url('images/logo.png'); ?>">
    <link rel="shortcut icon" href="<?= base_url('images/logo.png'); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend/css/cs-skin-elastic.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/backend/css/style.css'); ?>">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="<?= base_url('assets/backend/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/backend/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="<?= base_url('assets/backend/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/backend/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/backend/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/backend/vendor/sweetalert/sweetalert2.all.min.js'); ?>"></script>

</head>

<body>
    
    <!-- load sidebar -->
    <?php $this->load->view('theme/admin/sidebar');; ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- load header-->
        <?php $this->load->view('theme/admin/header');; ?>
        <!-- /#header -->

        <!-- Alert -->
        <?php $this->load->view('theme/admin/alert');; ?>

        <!-- load main content -->
        <?php $this->load->view($theme_page); ?>
        <!-- /.content -->

        <div class="clearfix"></div>

        <!-- Footer -->
        <?php $this->load->view('theme/admin/footer');; ?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?= base_url('assets/backend/js/main.js'); ?>"></script>
    <script src="<?= base_url('assets/backend/js/index.js'); ?>"></script>


</body>
</html>