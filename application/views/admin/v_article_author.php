<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Artikel</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Artikel</a></li>
                            <li><a href="#">lihat artikel</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Artikel</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table" cellspacing="0">
                                <thead class="">
                                    <tr>
                                        <th> # </th>
                                        <th> judul </th>
                                        <th> gambar </th>
                                        <th> kategori </th>
                                        <th> tanggal </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($data_author as $author): ?>
                                    <tr>
                                        <td> <?= $no++; ?> </td>
                                        <td> <?= $author['title'] ?> </td>
                                        <td> <img src="<?= base_url('images/upload_folder/' .$author['image']); ?>" class="img-fluid" style="height:75px; width:55px;" alt="ini gambar"> </td>
                                        <td> <?= $author['category']; ?> </td>
                                        <td> <?= $author['publishedAt']; ?> </td>
                                        <td> <?= $author['status'] == '1' ? '<div class ="btn btn-success btn-sm disabled">Verified</div>' : '<div class="btn btn-warning btn-sm disabled">Pending</div>'; ?> </td>
                                        <td> 
                                            <a href="<?= site_url('admin/article/update/'.$author['id_article']); ?>" class="btn btn-warning btn-sm " title="Edit">
                                                <i class="fas fa-edit"></i> 
                                            </a>
                                            <a href="<?= site_url('admin/article/delete/'.$author['id_article']); ?>" class="btn btn-danger btn-sm btnHapus" title="Hapus" data = "'.$field['id'].'">
                                                <i class="fas fa-trash-alt"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Js -->
<script type="text/javascript">
	$(document).ready(() => {
		$('#table').DataTable();
	});
</script>