<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/vendor/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/style.css'); ?>">
    <link href="<?= base_url('assets/backend/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

    <!-- js -->
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
                            <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama" value="<?= set_value('nama'); ?>">
                            <label class="text-input" for="floatingInput">Nama</label>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="nim" class="form-control" id="floatingInput" placeholder="nim" value="<?= set_value('nim'); ?>">
                            <label class="text-input" for="floatingInput">No telepon</label>
                            <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="telepon" value="<?= set_value('email'); ?>">
                            <label class="text-input" for="floatingInput">Email</label>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div>
                            <p>&nbsp;</p>
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" name="submit" value="Submit" class="button button-guestbook">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-12">
                    <button class="button button-guestbook__list" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-book-open"></i> Daftar hadir</button>
                </div>
            </div>
            <div class="col-md-6 guestbook-welcome d-sm-none d-md-block">
                <div class="guestbook-text">
                    <h1>Selamat datang</h1>
                    <p>Temukan dan bandingkan harga obat dari berbagai toko/apotek di Indonesia</p>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal" tabindex="-1" id="exampleModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Hadir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="card-body" style="display: block;">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Nama </th>
                                    <th> Time </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($guestbook as $data) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= date('l jS \of F Y h:i:s A"', strtotime($data['date'])); ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="<?= base_url('assets/frontend/vendor/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/frontend/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/backend/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

</body>

</html>

<!-- Datatables -->
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "pageLength": 5,
            "lengthChange": false,
        });
    });
</script>