
<div class="forum__section container">
    <div class="row">
        <div class="col-md-3">
            <h1>Forum ngobatin</h1>
            <p class="mt-3">Fitur forum ini bertujuan untuk mempermudah kalian untuk saling bertanya dan berbagi ilmu. Kamu dapat bertanya dan menjawab hal teknis terkait kesehatan atau obat.</p>
            <a href="<?= site_url('forum/insert/'); ?>" class="button button__primary mt-3 mb-5">Tambah Diskusi</a>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-12 search-section">
                    <form action="<?= base_url('forum'); ?>" method="post">
                        <div class="search__box">
                            <input id="search" class="searchbar" type="text" name="keyword" title="Search" placeholder="Cari pertanyaan..." autocomplete="off" autofocus>
                            <input type="submit" name="submit" hidden><i class="fas fa-search icon__search"></i>
                        </div>
                    </form>
                    <hr class="mt-5 mb-5">
                </div>
                <div class="col-12">
                    <div class="row container-cardforum">
                    <?php foreach ($data_forum  as $data) : ?>
                        <div class="card col-12">
                            <div class="card-body">
                                <a href="<?= site_url('forum/discussion/'.$data['id_forum']); ?>" style="text-decoration: none;"><h3 class="card-title mb-3" style="color: #fd2c72;"><?= $data['title'] ?></h3></a>
                                <p class="card-text mb-5"><?= $data['text']; ?></p>
                                <div class="cardfooter">
                                    <p class="items"><i class="fas fa-user" dt></i> <?= $data['nama']; ?></p>
                                    <p class="items"><i class="fas fa-filter"></i> <?= $data['category']; ?></p>
                                    <p class="items"><i class="fas fa-clock"></i> <?= date('l jS \of F Y h:i:s A"', strtotime($data['time'])); ?></p>
                                    <p class="items"><i class="fas fa-comment"></i> <?= $data['total'] == null ? "0"  : $data['total']?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>