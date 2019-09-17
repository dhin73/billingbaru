<?php $this->load->view("header_view"); ?>

<!-- Page Heading -->
<div class="row">
	<div class="col">
		<h1 class="h3 mb-2 text-gray-800">List Ticket</h1>
		<p class="mb-4">Tiket Anda hari ini</p>
	</div>
	<div class="col text-right">
		<button class="btn btn-primary" data-toggle="modal" data-target="#addTicketModal">Tambah</button>
	</div>
</div>
 <?php 
  $data=$this->session->flashdata('successMsg');
  if($data!=""){ ?>
  <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
  <?php } ?>
 
  <?php 
  $data2=$this->session->flashdata('errorMsg');
  if($data2!=""){ ?>
  <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
  <?php } ?>

<!-- Table -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-sm table-hover" id="" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">no id</th>
						<th class="text-center">Ticket ID</th>
						<th class="text-center">Job</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Poin</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (is_array($ticketResult)): ?>
					<?php foreach ($ticketResult as $ticketKey => $ticketRow): ?>
						<tr>
							<td style="vertical-align:middle;" class="text-center"><?=$ticketKey+1;?></td>
							<td style="vertical-align:middle;" class="text-center"><?=$ticketRow->id;?></td>
							<td style="vertical-align:middle;" class="text-center"><?=$ticketRow->ticketid;?></td>
							<td style="vertical-align:middle;"><?=$ticketRow->job;?></td>
							<td style="vertical-align:middle;" class="text-center"><?=$ticketRow->date;?></td>
							<td style="vertical-align:middle;" class="text-center"><?=$ticketRow->point;?></td>
							<td style="vertical-align:middle;" class="text-center">
								<a href="#" class="btn btn-sm" data-toggle="modal" data-target="#editTicketModal<?=$ticketRow->id;?>" data-id="<?=$ticketRow->id;?>" data-ticketid="<?=$ticketRow->ticketid;?>" data-jobid="<?=$ticketRow->jobid;?>"><i class="fas fa-edit"></i> Edit</a>

								 <a href="<?php echo site_url('ticket/delete/'.$ticketRow->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?=$ticketRow->ticketid;?>?');" class="btn btn-sm"> Hapus <i class="fa fa-trash"></i></a>

								 <!--<a href="#!" onclick="deleteConfirm('<?=base_url('ticket/delete'.$ticketRow->id);?>')" class="btn btn-sm text-danger"><i class="fas fa-trash"></i> Hapus</a>-->
							</td>
						</tr>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="6" class="text-center">Belum ada record ticket hari ini</td>
						</tr>
					<?php endif ?>
				</tbody>
				<?php if ($ticketTotal): ?>
				<tfoot>
					<tr>
						<th class="text-center" colspan="4">Total Poin</th>
						<th class="text-center"><?=$ticketTotal;?></th>
					</tr>
				</tfoot>
				<?php endif ?>
			</table>
		</div>
	</div>
</div>

<!-- Modal - Add Ticket -->
<div class="modal fade" id="addTicketModal" tabindex="-1" role="dialog" aria-labelledby="addTicketModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addTicketModalLabel">Tambah Ticket</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?=base_url('ticket/add');?>" method="post">
				<div class="modal-body">
						<div class="form-group">
							<label for="ticketid" class="control-label">Ticket ID</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">#</div>
								</div>
								<input type="text" class="form-control" name="ticketid" id="ticketid" placeholder="TicketID" required>
							</div>
						</div>
						<div class="form-group">
							<label for="jobid" class="control-label">Job</label>
							<div class="input-group mb-2">
								<select class="form-control" name="jobid" id="jobid" required>
									<?php foreach ($ticketjobResult as $jobRow): ?>
									<option value="<?=$jobRow->id;?>"><?=$jobRow->job;?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary" type="submit">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal - Edit Ticket -->
<?php if (is_array($ticketResult)): ?>
<?php foreach($ticketResult as $ticketRow): ?>
<div class="modal fade" id="editTicketModal<?=$ticketRow->id;?>" tabindex="-1" role="dialog" aria-labelledby="editTicketModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editTicketModalLabel">Perbarui Ticket</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?=base_url('ticket/edit');?>" method="post">
				<div class="modal-body">
					<input type="text" name="id" id="id" value="<?=$ticketRow->id;?>">
					<div class="form-group">
						<label for="ticketid" class="control-label">Ticket ID</label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">#</div>
							</div>
							<input type="text" class="form-control" name="ticketid" id="ticketid" placeholder="TicketID"  value="<?=$ticketRow->ticketid;?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="jobid" class="control-label">Job</label>
						<div class="input-group mb-2">
							<select class="form-control" name="jobid" id="jobid" required>
								<?php foreach ($ticketjobResult as $jobRow): ?>
								<option value="<?=$jobRow->id;?>"><?=$jobRow->job;?></option>
								<?php endforeach ?>
							</select>
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
	$('#editTicketModal').on('show.bs.modal',function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var ticketid = button.data('ticketid')
		var jobid = button.data('jobid')
		// var userid = button.data('userid')
		var modal = $(this)
		modal.find('.modal-body #id').val(id)
		modal.find('.modal-body #ticketid').val(ticketid)
		modal.find('.modal-body #jobid').val(jobid)
		// modal.find('.modal-body #userid').val(userid)
	})
</script>
<?php $this->load->view("footer_view"); ?>