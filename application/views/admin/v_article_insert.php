<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah data</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Artikel</a></li>
                            <li><a href="#">Tambah artikel</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Form -->
                <form method="post" action="<?= site_url('admin/article/insert/'); ?>" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-12 d-none">
                            <input type="text" class="form-control " name="author" value="<?= $id ?>">
                            <?= form_error('author', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-12">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="title" value="<?= set_value('title'); ?>">
                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control" value="<?= set_value('id_kategori'); ?>">
                                <option name="" selected disabled>-- Pilih --</option>
                                <?php foreach ($data_category as $category) : ?>
                                    <option value="<?= $category['id']; ?>"><?= $category['category']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-12">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" name="description" value="<?= set_value('description'); ?>">
                            <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Isi Konten</label>
                            <textarea id="editor" type="text" class="form-control" name="content" value="" rows="5"><?= set_value('content'); ?></textarea>
                            <?= form_error('content', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <label>Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="" name="userfile" id="validatedInputGroupCustomFile" required>
                        <!--response setelah upload-->
                        <?php if (!empty($response)) : ?>
                            <small class="text-danger pl-3">
                                <?= $response; ?>
                            </small>
                        <?php endif; ?>
                    </div>
                    <div class="text-right">
                        <p>&nbsp;</p>
                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                        <a class="btn btn-danger" href="<?= base_url('admin/article/read/'); ?>">Batal</a>
                    </div>
                </form>
                <!-- Form -->
            </div>
        </div>
    </div>
</div>