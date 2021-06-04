
<div class="discussion__section container">
    <div class="row">
        <div class="col-md-9">
        <?php foreach ($data_forum_single as $data) : ?>
            <h1><?= $data['title']; ?></h1>
            <p class="mt-3"><?= $data['text']; ?></p>
            <div class="list-items mt-5">
                <p class="items"><i class="fas fa-user" dt></i> <?= $data['nama']; ?></p>
                <p class="items"><i class="fas fa-filter"></i> <?= $data['category']; ?></p>
                <p class="items"><i class="fas fa-clock"></i> <?= date('l jS \of F Y "', strtotime($data['time'])); ?></p>
                <p class="items"><i class="fas fa-comment"></i> <?php foreach ($total_comment as $total) : ?>
                            <?= $total['total']; ?>
                        <?php endforeach ?></p>
            </div>
            <hr>
        <?php endforeach ?>
            <div class="comment__section">
                <form method="post" action="<?= site_url('forum/discussion/'); ?>" enctype="multipart/form-data">
                    <div class="form-group col-12">
                        <p>Commentar :</p>
                        <input type="hidden" class="form-control" name="id" value="<?= $id ?>">
                        <textarea id="editor" type="text" class="form-control" name="content" value="" rows="5" placeholder="Type Something"><?= set_value('content'); ?></textarea>
                        <?= form_error('content', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="text-end">
                        <input class="button button__primary mt-5" type="submit" name="submit" value="Kirim">
                    </div>
                </form>
                <hr class="mt-5 mb-5">
                <div class="row">
                    <h2>Comment</h2>
                    <div class="row container-cardforum">
                    <?php foreach ($data_forum  as $data) : ?>
                        <div class="card col-12 pb-3 pt-3 <?= $data['user'] == null ? "d-none" :  $data['user']; ?>">
                            <div class="card-body">
                                <div class="cardfooter">
                                    <p class="items"><i class="fas fa-user" dt></i> <?= $data['user']; ?></p>
                                    <p class="items"><i class="fas fa-clock"></i> <?= date('l jS \of F Y"', strtotime($data['time'])); ?></p>
                                </div>
                                <p class="card-text"><?= $data['comment']; ?></p>
                            </div>
                        </div>
                        <p class="<?= $data['user'] == null ? $data['user'] : "d-none" ?>">0 Comment</p>
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
    

<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>