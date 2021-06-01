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
                <li><a href="http://localhost/ngobatin/article/read">Artikel</a></li>
                <li><a href="http://localhost/ngobatin/forum/read">Forum</a></li>
            </ul>
        </nav>
        <a class="button button__primary" href="http://127.0.0.1:8887/detail.html"><i class="fas fa-hand-holding-usd text-white"></i></a>
    </header>

    <main>
        <div class="discussion__section container">
            <div class="row">
                <div class="col-md-9">
                <?php foreach ($data_forum_single as $data) : ?>
                    <h1><?= $data['title']; ?></h1>
                    <p class="mt-3"><?= $data['text']; ?></p>
                    <div class="list-items mt-5">
                        <p class="items"><i class="fas fa-user" dt></i> <?= $data['nama']; ?></p>
                        <p class="items"><i class="fas fa-filter"></i> <?= $data['category']; ?></p>
                        <p class="items"><i class="fas fa-clock"></i> <?= date('l jS \of F Y h:i:s A"', strtotime($data['time'])); ?></p>
                        <p class="items"><i class="fas fa-comment"></i> <?php foreach ($total_comment as $total) : ?>
                                    <?= $total['total']; ?>
                                <?php endforeach ?></p>
                    </div>
                    <hr>
                <?php endforeach ?>
                <div class="comment__section">
                    <form method="post" action="<?= site_url('admin/invoice/insert/'); ?>" enctype="multipart/form-data">
                        <div class="form-group col-12">
                            <p>Commentar :</p>
                            <textarea id="editor" type="text" class="form-control" name="content" value="" rows="5" placeholder="Type Something"><?= set_value('content'); ?></textarea>
                            <?= form_error('content', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="text-end">
                            <a href="#" class="button button__primary mt-5 text-end">Kirim</a>
                        </div>
                    </form>
                    <hr class="mt-5 mb-5">
                    <div class="row">
                        <div class="row container-cardforum">
                        <?php foreach ($data_forum  as $data) : ?>
                            <div class="card col-12 pb-3 pt-3">
                                <div class="card-body">
                                    <div class="cardfooter">
                                        <p class="items"><i class="fas fa-user" dt></i> <?= $data['user']; ?></p>
                                        <p class="items"><i class="fas fa-clock"></i> <?= date('l jS \of F Y h:i:s A"', strtotime($data['time'])); ?></p>
                                    </div>
                                    <p class="card-text"><?= $data['comment']; ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-3">
                    <div class="ads-space">
                        <p>space avalaible</p>
                        <p>250 x 250</p>
                    </div>
                </div>
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

</body>
</html>

<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>