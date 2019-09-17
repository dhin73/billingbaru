<?php $this->load->view("header_view"); ?>

<!-- Page Heading -->
<div class="row">
	<div class="col">
		<h1 class="h3 mb-2 text-gray-800">Job Invoice</h1>
		<p class="mb-4">List Job Invoice beserta poinnya</p>
	</div>
	<div class="col text-right">
		<button class="btn btn-primary" data-toggle="modal" data-target="#addJobModal">Tambah</button>
	</div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">Job Invoice</th>
						<th class="text-center">Poin</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($jobResult as $jobRow): ?>
						<tr>
							<td style="vertical-align:middle;"><?=$jobRow->job;?></td>
							<td class="text-center" style="vertical-align:middle;"><?=$jobRow->point;?></td>
							<td class="text-center">
								<a href="#" class="btn btn-sm" data-toggle="modal" target="#editJobModal"><i class="fas fa-edit"></i> Edit</a>
								<a href="#" class="btn btn-sm text-danger" onclick="deleteConfirm('<?=base_url('tiket/job/delete'.$jobRow->id);?>')"><i class="fas fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href',url);
		$('#deleteModal').modal();
	}
</script>
<?php $this->load->view("footer_view"); ?>