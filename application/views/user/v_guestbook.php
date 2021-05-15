<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/vendor/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/style.css'); ?>">
    <script defer src="<?= base_url('assets/frontend/vendor/@fortawesome/fontawesome-free/js/brands.js'); ?>"></script>
    <script defer src="<?= base_url('assets/frontend/vendor/@fortawesome/fontawesome-free/js/solid.js'); ?>"></script>
    <script defer src="<?= base_url('assets/frontend/vendor/@fortawesome/fontawesome-free/js/regular.js'); ?>"></script>
    <script defer src="<?= base_url('assets/frontend/vendor/@fortawesome/fontawesome-free/js/fontawesome.js'); ?>"></script>
    <title>Ngobatin - Buku tamu</title>
</head>
<body>
    <div class="guestbook-container container">
        <div class="row">
            <div class="col-md-6 guestbook-form">
                <div class="text-center">
                    <img src="<?= base_url('images/logo.png'); ?>" alt="logo" width="30%">
                    <p>Silahkan mengisi buku tamu terlebih dahulu</p>
                </div>
                <form method="post" action="<?= site_url('guestbook/insert/'); ?>">
                    <div class="form-row">
                        <div class="form-floating mb-3">
                            <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama"  value="<?= set_value('nama'); ?>">
                            <label class="text-input" for="floatingInput">Nama</label>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="nim" class="form-control" id="floatingInput" placeholder="nim"  value="<?= set_value('nim'); ?>">
                            <label class="text-input" for="floatingInput">Nim</label>
                            <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="telepon"  value="<?= set_value('email'); ?>">
                            <label class="text-input" for="floatingInput">Email</label>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div>
                            <p>&nbsp;</p>
                            <input type="submit" name="submit" value="Submit" class="button button-guestbook">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 guestbook-welcome d-sm-none d-md-block">
                <div class="guestbook-text">
                    <h1>Selamat datang</h1>
                    <p>Temukan dan bandingkan harga obat dari berbagai toko/apotek di Indonesia</p>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="<?= base_url('assets/frontend/vendor/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/frontend/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>