<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?=base_url('logout');?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Edit Ticket Job -->
<!--<div class="modal fade" id="editJobModal" tabindex="-1" role="dialog" aria-labelledby="editJobModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editJobModalLabel">Edit Job</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
			</div>
		</div>
	</div>
</div>-->

<!-- Delete Ticket Job -->
<!--<div class="modal fade" id="deleteJobModal" tabindex="-1" role="dialog" aria-labelledby="deleteJobModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteJobModalLabel">Anda yakin?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
			</div>
		</div>
	</div>
</div>-->

<!-- Add Ticket Job -->
<!--<div class="modal fade" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="addJobModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addJobModalLabel">Tambah Job</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php base_url('tiket/job/add') ?>" method="post" enctype="multipart/form-data" >
					<div class="form-group">
						<label for="job">Job</label>
						<input class="textboxes" type="text" name="name" placeholder="Nama Job" />
					</div>

					<div class="form-group">
						<label for="poin">Poin</label>
						<input class="textboxes" type="text" name="name" placeholder="Poin Job" />
					</div>


					<div class="form-group">
						<label for="name">Photo</label>
						<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
						type="file" name="image" />
						<div class="invalid-feedback">
							<?php echo form_error('image') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Description*</label>
						<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
							name="description" placeholder="Product description..."></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('description') ?>
						</div>
					</div>

					<input class="btn btn-success" type="submit" name="btn" value="Save" />
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Tambah</button>
				a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
			</div>
		</div>
	</div>
</div>-->
