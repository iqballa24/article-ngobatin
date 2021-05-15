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
                            <li><a href="#">User</a></li>
                            <li><a href="#">Tambah user</a></li>
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
                <form method="post" action="<?= site_url('admin/user/insert/'); ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" value="<?= set_value('level'); ?>">
                            <option name="" selected disabled>-- Pilih --</option>
                            <option value="admin">admin</option>
                            <option value="author">author</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <p>&nbsp;</p>
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a class="btn btn-danger" href="<?= base_url('admin/user/read/'); ?>">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>