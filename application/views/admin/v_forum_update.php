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
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Update forum</a></li>
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
                <form method="post" action="<?php echo site_url('admin/forum/update/' . $data_forum_single['id_forum']); ?>">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" value="<?= set_value('status'); ?>" required>
                            <option value="<?php echo $data_forum_single['isPositif']; ?>" selected><?php echo $data_forum_single['isPositif'] == '1' ? "Verified" : "Pending"; ?></option>
                            <option value="1">Verified</option>
                            <option value="2">Pending</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <p>&nbsp;</p>
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a class="btn btn-danger" href="<?= base_url('admin/forum/read/'); ?>">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>