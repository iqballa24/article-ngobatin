<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update data</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Artikel</a></li>
                            <li><a href="#">Update artikel</a></li>
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
                <form method="post" action="<?php echo site_url('admin/article/update_submit/'.$data_article_single['id_article']); ?>" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-12 d-none">
                            <label>Author</label>
                            <input type="text" class="form-control" name="author" value="<?= $data_article_single['id_author']; ?>" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="title" value="<?= $data_article_single['title']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Kategori</label>
                            <select name="id_category" class="form-control" value="<?= set_value('id_category'); ?>" required>
                            <?php foreach ($data_category as $category) : ?>
                                <?php if ($category['id'] == $data_article_single['id_category']) : ?>
                                    <option value="<?= $category['id']; ?>" selected><?= $category['category']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $category['id']; ?>"><?= $category['category']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" name="description" value="<?= $data_article_single['description']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Isi Konten</label>
                            <textarea id="editor" type="text" class="form-control" name="content" value="" rows="5" required><?= $data_article_single['content']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group <?= $level == 'author' ? 'd-none' : '' ?>">
                        <label>Status</label>
                        <select name="status" class="form-control" value="<?= set_value('status'); ?>" required>
                            <option value="<?php echo $data_article_single['status']; ?>" selected><?php echo $data_article_single['status'] == '1' ? 'Verified': 'Pending'; ?></option>
                            <option value="<?php echo $data_article_single['status'] == '1' ? '2' : '1'; ?>"><?php echo $data_article_single['status'] == '1' ? 'Pending' : 'Verified'; ?></option>
                        </select>
                    </div>
                    <label>Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="" name="userfile" id="validatedInputGroupCustomFile" value="<?= $data_article_single['image']; ?>" required>
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