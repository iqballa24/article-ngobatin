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
            <h1><a href="http://localhost/ngobatin/admin/user" target="_blank"><img class="logo" src="<?=base_url('images/logo.png'); ?>" alt="logo"> Ngobatin<span>.</span></a></h1>
        </div>
        <nav>
            <ul class="nav__links">
                <li><a href="http://127.0.0.1:8887/index.html">Beranda</a></li>
                <li><a href="http://127.0.0.1:8887/about.html">Tentang</a></li>
                <li><a href="http://localhost/ngobatin/article/read">Artikel</a></li>
            </ul>
        </nav>
        <a class="button button__primary" href=""><i class="fas fa-hand-holding-usd text-white"></i></a>
    </header>

    <main>
        <div class="article__section container">
            <div class="row">
                <?php foreach ($detail as $data): ?>
                <div class="col-md-8">
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
                <div class="col-md-4">
                    
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    
    <script src="<?= base_url('assets/frontend/vendor/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/frontend/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>