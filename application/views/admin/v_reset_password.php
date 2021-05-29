<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Ubah password</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Password</a></li>
                            <li><a href="#">Ubah password</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="col-7 mr-auto ml-auto">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post" action="<?= site_url('admin/user/reset/'); ?>">
                    <div class="form-group">
                        <label>Password lama</label>
                        <input type="text" class="form-control" name="password_lama" value="<?= set_value('password_lama'); ?>">
                        <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="text" class="form-control" name="password_baru" value="<?= set_value('password_baru'); ?>">
                        <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Ulangi password baru</label>
                        <input type="text" class="form-control" name="password_baru_ulangi" value="<?= set_value('password_baru_ulangi'); ?>">
                        <?= form_error('password_baru_ulangi', '<small class="text-danger pl-3">', '</small>'); ?>
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