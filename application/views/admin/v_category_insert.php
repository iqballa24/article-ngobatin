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
                            <li><a href="#">Kategori</a></li>
                            <li><a href="#">Tambah kategori</a></li>
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
                <form method="post" action="<?= site_url('admin/category/insert/'); ?>">
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" name="category" value="<?= set_value('category'); ?>">
                        <?= form_error('category', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="text-right">
                        <p>&nbsp;</p>
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a class="btn btn-danger" href="<?= base_url('admin/category/read/'); ?>">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>