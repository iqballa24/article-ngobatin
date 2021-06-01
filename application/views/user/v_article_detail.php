<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="<?= base_url('images/logo.png'); ?>">
    <link rel="shortcut icon" href="<?= base_url('images/logo.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/vendor/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/style.css'); ?>">
    <script defer src="<?= base_url('assets/frontend/vendor/@fortawesome/fontawesome-free/js/brands.js'); ?>"></script>
    <script defer src="<?= base_url('assets/frontend/vendor/@fortawesome/fontawesome-free/js/solid.js'); ?>"></script>
    <script defer src="<?= base_url('assets/frontend/vendor/@fortawesome/fontawesome-free/js/regular.js'); ?>"></script>
    <script defer src="<?= base_url('assets/frontend/vendor/@fortawesome/fontawesome-free/js/fontawesome.js'); ?>"></script>
    <title>Ngobatin</title>
</head>

<body>
    <header>
        <div class="logo__container">
            <h1><a href="http://localhost:8012/ngobatin1/admin/user" target="_blank"><img class="logo" src="<?=base_url('images/logo.png'); ?>" alt="logo"> Ngobatin<span>.</span></a></h1>
        </div>
        <nav>
            <ul class="nav__links">
                <li><a href="http://127.0.0.1:8887/index.html">Beranda</a></li>
                <li><a href="http://127.0.0.1:8887/about.html">Tentang</a></li>
                <li><a href="http://localhost:8012/ngobatin1/article/read">Artikel</a></li>
                <li><a href="http://localhost/ngobatin/forum/read">Forum</a></li>
            </ul>
        </nav>
        <a class="button button__primary" href=""><i class="fas fa-hand-holding-usd text-white"></i></a>
    </header>

    <main>
        <div class="article__section container">
            <div class="row">
                <?php foreach ($detail as $data): ?>
                <div class="col-md-9">
                    <h1 class="card-title article__title"><?= $data['title']; ?></h1>
                    <div class="card">
                        <img src="<?= base_url('images/upload_folder/'.$data['image']); ?>" class="card-img-top article__image" alt="<?= $data['image']; ?>" style="max-height: 400px; max-width: 800px;">
                        <div class="card-body">
                            <p class="card-text article__text"><?= date('d F Y', strtotime($data['publishedAt'])); ?></p>
                            <p class="card-text article__text"><?= $data['content']; ?></p>
                            <div class="text-start">
                                <p class="card-text"><b>author :</b> <?= $data['nama']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container-ads" class="d-sm-none d-md-block">
                        <div class="box-text">
                            <img src="https://tpc.googlesyndication.com/simgad/4591419185023691032?sqp=4sqPyQQrQikqJwhfEAEdAAC0QiABKAEwCTgDQPCTCUgAUAFYAWBfcAJ4AcUBLbKdPg&rs=AOga4qm1LEItbCTHV_G9N_GttfCjGNCQUQ" alt="">
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h1 class="mb-5 footer__title">Ngobatin<span>.</span></h1>
                            <p>Platform website pembanding harga obat obatan apotek dan perlengkapan penunjang kegiatan luar rumah yang dibangun untuk membantu masyarakat dalam menemukan harga terbaik di masa pandemi.</p>
                        </div>
                        <div class="col-12 ">
                            <a href="" class="button button__sosialmedia"><i class="fab fa-facebook-f" style="width: 30px; color: white;"></i></a>
                            <a href="" class="button button__sosialmedia"><i class="fab fa-linkedin-in" style="width: 30px; color: white;"></i></a>
                            <a href="" class="button button__sosialmedia"><i class="fab fa-instagram" style="width: 30px; color: white;"></i></a>
                            <a href="" class="button button__sosialmedia"><i class="fas fa-envelope" style="width: 30px; color: white;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group__item"><i class="fas fa-map-marker-alt"></i> Jl. Raya, RT.4/RW.1, Meruya Sel., Kec. Kembangan, Jakarta</li>
                        <li class="list-group__item"><i class="fas fa-phone"></i> + 62 812 8431 4407</li>
                        <li class="list-group__item"><i class="fas fa-envelope"></i> admin@ngobatin.com</li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="box-cprght">
                        <p>Copyright 2021 <span>Ngobatin</span>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="<?= base_url('assets/frontend/vendor/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/frontend/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>