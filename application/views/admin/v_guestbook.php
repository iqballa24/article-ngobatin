<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Buku Tamu</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Buku Tamu</a></li>
                            <li><a href="#">lihat buku tamu</a></li>
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
                        <strong class="card-title">Data Buku Tamu</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table" width="100%" cellspacing="0">
                                <thead class="">
                                    <tr>
                                        <th> # </th>
                                        <th> Nama </th>
                                        <th> Nim </th>
                                        <th> Email </th>
                                        <th> Waktu </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- content table -->
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
		$('#table').DataTable({
			"responsive": true,
			"processing": true,
			"language": {
				"processing": '<i class="fas fa-circle-notch fa-spin fa-1x fa-fw"></i><span>Loading...</span> '
			},
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?php echo site_url('admin/guestbook/datatables') ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"targets": [0, 4],
				"className": 'dt-center',
				"orderable": false,
			}],
		});

	});
</script>