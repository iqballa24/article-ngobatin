<div class="article__section container">
    <div class="row">
        <?php foreach ($data_article as $data) : ?>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="<?= base_url('images/upload_folder/' . $data['image']); ?>" class="card-img-top article__image" alt="<?= $data['image']; ?>">
                    <div class="card-body">
                        <h1 class="card-title article__title"><?= $data['title']; ?></h1>
                        <p class="card-text article__text"><?= $data['description']; ?></p>
                        <p class="card-text article__text"><?= date('d F Y', strtotime($data['publishedAt'])); ?></p>
                        <div class="text-end">
                            <a href="<?= site_url('article/detail/' . $data['id_article']); ?>" class="article__detail">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
