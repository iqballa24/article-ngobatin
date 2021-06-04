
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

<script src="<?= base_url('assets/frontend/vendor/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/frontend/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>