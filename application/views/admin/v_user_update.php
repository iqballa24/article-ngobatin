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
                            <li><a href="#">User</a></li>
                            <li><a href="#">Kelola user</a></li>
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
                <form method="post" action="<?php echo site_url('admin/user/update/' . $data_user_single['id']); ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama"  value="<?php echo $data_user_single['nama']; ?>" required>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email"  value="<?php echo $data_user_single['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" value="<?= set_value('level'); ?>" required>
                            <option value="<?php echo $data_user_single['level']; ?>" selected><?php echo $data_user_single['level']; ?></option>
                            <option value="<?php echo $data_user_single['level'] == 'author' ? 'admin' : 'author'; ?>"><?php echo $data_user_single['level'] == 'author' ? 'admin' : 'author'; ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" value="<?= set_value('status'); ?>" required>
                            <option value="<?php echo $data_user_single['status']; ?>" selected><?php echo $data_user_single['status'] == '1' ? 'Active': 'Non active'; ?></option>
                            <option value="<?php echo $data_user_single['status'] == '1' ? '2' : '1'; ?>"><?php echo $data_user_single['status'] == '1' ? 'Non active' : 'Active'; ?></option>
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