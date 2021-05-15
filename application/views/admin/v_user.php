<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">User</a></li>
                            <li><a href="#">lihat User</a></li>
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
                        <strong class="card-title">Data User</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table" width="100%" cellspacing="0">
                                <thead class="">
                                    <tr>
                                        <th> # </th>
                                        <th> Nama </th>
                                        <th> Email </th>
                                        <th> Level </th>
                                        <th> Status </th>
                                        <th> Action </th>
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
				"url": "<?php echo site_url('admin/user/datatables') ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"targets": [0, 5],
				"className": 'dt-center',
				"orderable": false,
			}],
		});

	});
</script>