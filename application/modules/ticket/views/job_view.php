<?php $this->load->view("header_view"); ?>

<!-- Page Heading -->
<div class="row">
	<div class="col">
		<h1 class="h3 mb-2 text-gray-800">Job Tiket</h1>
		<p class="mb-4">List Job Tiket beserta poinnya</p>
	</div>
	<div class="col text-right">
		<button class="btn btn-primary" data-toggle="modal" data-target="#addJobModal">Tambah</button>
	</div>
</div>

<!-- Data -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">Job Tiket</th>
						<th class="text-center">Poin</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (is_array($jobResult)): ?>
					<?php foreach ($jobResult as $jobRow): ?>
						<tr>
							<td style="vertical-align:middle;"><?=$jobRow->job;?></td>
							<td class="text-center" style="vertical-align:middle;"><?=$jobRow->point;?></td>
							<td class="text-center">
								
								<a data-toggle="modal" data-target="#editJobModal<?=$jobRow->id;?>" class="btn btn-sm"><i class="fas fa-edit"></i> Edit</a>
								<a href="#" class="btn btn-sm text-danger" onclick="deleteConfirm('<?=base_url('tiket/job/delete'.$jobRow->id);?>')"><i class="fas fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="6" class="text-center">Belum ada data</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal - Edit Ticket -->
<?php if (is_array($jobResult)): ?>
<?php foreach($jobResult as $jobRow):?>
<div class="modal fade" id="editJobModal<?=$jobRow->id;?>" tabindex="-1" role="dialog" aria-labelledby="editJobModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editJobModalLabel">Perbarui Data</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?=base_url('ticket/editjob');?>" method="post">
				<div class="modal-body">
					<input type="text" name="id" id="id" value="<?=$jobRow->id;?>">
					<div class="form-group">
						<label for="ticketid" class="control-label">Job</label>
						<div class="input-group mb-2">
							
							<input type="text" class="form-control" name="job" id="job" placeholder="Job"  value="<?=$jobRow->job;?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="ticketid" class="control-label">Point</label>
						<div class="input-group mb-2">
							
							<input type="text" class="form-control" name="point" id="point" placeholder="Point"  value="<?=$jobRow->point;?>" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary" type="submit">Perbarui</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; endif; ?>



<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href',url);
		$('#deleteModal').modal();
	}
</script>
<?php $this->load->view("footer_view"); ?>