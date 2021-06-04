<div class="addforum__section container">
    <div class="row">
        <div class="col-12">
            <h1>Buat Diskusi Baru</h1>
            <div class="alert alert-warning" role="alert">
                <p>A simple warning alert—check it out!</p> 
            </div>
        </div>
        <div class="col-12 mt-5">
            <form form method="post" action="<?= site_url('forum/insert/'); ?>" enctype="multipart/form-data">
                <div class="form-group col-12">
                    <div class="form-row">
                        <div class="form-group col-12 mb-3">
                            <p>Judul pertanyaan</p>
                            <input type="text" class="form-control" name="question" value="<?= set_value('question'); ?>">
                            <?= form_error('question', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <p>Uraian pertanyaan :</p>
                    <textarea id="editor" type="text" class="form-control" name="detail_question" value="" rows="5" placeholder="Type Something"><?= set_value('detail_question'); ?></textarea>
                    <?= form_error('detail_question', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="form-row col-6">
                        <div class="form-group mt-3">
                            <p>Kategori</p>
                            <select name="id_kategori" class="form-control" value="<?= set_value('id_kategori'); ?>" style="background-color: white;">
                                <option name="" selected disabled>-- Pilih --</option>
                                <?php foreach ($data_category as $category) : ?>
                                    <option value="<?= $category['id']; ?>"><?= $category['category']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                <input class="button button__primary mt-5" type="submit" name="submit" value="Kirim">
                </div>
            </form>
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