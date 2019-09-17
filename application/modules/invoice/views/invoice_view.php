<?php $this->load->view("header_view"); ?>

<!-- Page Heading -->
<div class="row">
	<div class="col">
		<h1 class="h3 mb-2 text-gray-800">List Invoice</h1>
		<p class="mb-4">Invoice Anda hari ini</p>
	</div>
	<div class="col text-right">
		<button class="btn btn-primary" data-toggle="modal" data-target="#addInvoiceModal">Tambah</button>
	</div>
</div>

<!-- Table -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-sm table-hover datatab" id="mydata" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Invoice ID</th>
						<th class="text-center">Job</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">ID</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php 
	                    $nomor=1;
	                    if (is_array($invoiceResult)): 
						foreach ($invoiceResult as $invoiceKey => $invoiceRow): 
					?>
                <tr>
                	<td style="vertical-align:middle;" class="text-center"><?php echo $nomor;?></td>
                    <td style="vertical-align:middle;" class="text-center"><?=$invoiceRow->invoiceid;?></td>
                    <td style="vertical-align:middle;"><?=$invoiceRow->job;?></td>
                    <td style="vertical-align:middle;" class="text-center"><?=$invoiceRow->date;?></td>
					<td style="vertical-align:middle;" class="text-center"><?=$invoiceRow->id;?></td>
                    <td class="text-center">
                    	<a data-toggle="modal" data-target="#editInvoiceModal<?=$invoiceRow->id;?>" class="btn btn-sm"><i class="fas fa-edit"></i> Edit</a>

                        <a href="<?php echo site_url('invoice/delete/'.$invoiceRow->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Invoice <?=$invoiceRow->invoiceid;?> ?');" class="btn btn-sm"> Hapus <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                	$nomor++;
                	endforeach;
	                endif;
                ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal - Add Invoice -->
<div class="modal fade" id="addInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="addInvoiceModalLabel">Tambah Invoice</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<form action="<?=base_url('invoice/add');?>" method="post">
			<div class="modal-body">
					<div class="form-group">
						<label for="invoiceid" class="control-label">Invoice ID</label>
						<div class="input-group mb-2">
							<!--<div class="input-group-prepend">
								<div class="input-group-text">#</div>
							</div>-->
							<input type="text" class="form-control" name="invoiceid" id="invoiceid" placeholder="Invoice ID" required>
						</div>
					</div>
					<div class="form-group">
						<label for="jobid" class="control-label">Job</label>
						<div class="input-group mb-2">
							<select class="form-control" name="jobid" id="jobid" onchange="showConfig(this.value);" required>
								<option value="">Pilih job...</option>
								<?php foreach ($invoicejobResult as $jobRow): ?>
								<option value="<?=$jobRow->id;?>"><?=$jobRow->job;?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<!-- C/D Invoice -->
					<div id="job1" style="display: none;">
						<div class="form-group">
							<label for="action" class="control-label">Aksi</label>
							<div class="input-group mb-2">
								<select class="form-control" name="config[action]" id="action">
									<option value="">Pilih aksi...</option>
									<option value="create">Create</option>
									<option value="delete">Delete</option>
								</select>
							</div>
						</div>
					</div>
					<!-- Invoice Manual -->
					<div id="job2" style="display: none;">
						<!--<div class="form-group">
							<label for="ticketid" class="control-label">Ticket ID</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">#</div>
								</div>
								<input type="text" class="form-control" name="config[ticketid]" id="ticketid" placeholder="Ticket ID">
							</div>
						</div>-->
						<div class="form-group">
							<label for="paymentstatus" class="control-label">Status Pembayaran</label>
							<div class="input-group mb-2">
								<select class="form-control" name="config[paymentstatus]" id="paymentstatus">
									<option value="">Pilih status...</option>
									<option value="paid">Sudah Bayar</option>
									<option value="unpaid">Belum Bayar</option>
								</select>
							</div>
						</div>
						<!--<div class="form-group">
							<label for="domain" class="control-label">Nama Domain</label>
							<input type="text" class="form-control" name="config[domain]" id="domain" placeholder="Domain Name">
						</div>-->
						<div class="form-group">
							<label for="clientid" class="control-label">Client ID</label>
							<input type="number" class="form-control" name="config[clientid]" id="clientid" placeholder="Client ID">
						</div>
						<div class="form-group">
							<label for="npwp" class="control-label">NPWP</label>
							<td>
								<br>
							</td>
							<td>
							  <input type="radio" id="config[npwp]" name="config[npwp]" checked>
							  <label>Ada </label>
							</td>

							<td>
							  <input type="radio" id="dewey" name="config[npwp]">
							  <label>Tidak Ada </label>
							</td>

							<input type="text" class="form-control" name="config[npwp]" id="npwp" placeholder="NPWP">
						</div>
						<!--<div class="form-group">
							<label for="emaillist" class="control-label">Milis</label>
							<input type="text" class="form-control" name="config[emaillist]" id="emaillist" placeholder="Client ID">
						</div>-->
						
					</div>
					<!-- Revisi Invoice -->
					<div id="job3" style="display: none;">
						<div class="form-group">
							<label for="revision" class="control-label">Invoice ID</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">#</div>
								</div>
								<input type="number" class="form-control" name="config[revision]" id="revision" placeholder="Invoice ID Sesudah">
							</div>
						</div>
					</div>
					<!-- Universal -->
					<div id="note" style="display: none;">
						<div class="form-group">
							<label for="note" class="control-label">Keterangan</label>
							<textarea class="form-control" name="note" id="note" rows="3"></textarea>
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

<!-- Modal - Edit Invoice -->
<!--<?php
if (is_array($invoiceResult)): 
foreach ($invoiceResult as $invoiceKey => $invoiceRow): 
?>
<div class="modal fade" id="editGantikontakModal<?=$invoiceRow->id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editInvoiceModalLabel">Perbarui Invoice</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"></span>
				</button>
			</div>
			<form action="<?=base_url('invoice/edit');?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="data-invoiceid">
					<div class="form-group">
						<label for="invoiceid" class="control-label">Invoice ID</label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">#</div>
							</div>
							<input type="text" class="form-control" name="invoiceid" id="invoiceid" placeholder="Invoice ID" value="<?=$invoiceRow->invoiceid;?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="jobid" class="control-label">Job</label>
						<div class="input-group mb-2">
							<select class="form-control" name="jobid" id="jobid" required>
								<?php foreach ($invoicejobResult as $jobRow): ?>
								<option value="<?=$jobRow->id;?>">
									<?=$jobRow->job;?>
									</option>
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
<?php
endforeach;
endif;
?>-->

<!-- Modal - Edit  -->
<?php 
  if (is_array($invoiceResult)): 
  foreach($invoiceResult as $invoiceRow): 
?>
<div class="modal fade" id="editInvoiceModal<?=$invoiceRow->id;?>" tabindex="-1" role="dialog" aria-labelledby="editInvoiceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editGantikontakModalLabel">Perbarui Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?=base_url('invoice/edit');?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="<?=$invoiceRow->id;?>">
          <div class="form-group">
            <label for="invoiceid" class="control-label">Invoice</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" name="invoiceid" id="invoiceid" value="<?=$invoiceRow->invoiceid;?>" placeholder="Nomor Invoice" required>
            </div>
          </div>
          <div class="form-group">
            <label for="jobid" class="control-label">Job</label>
            <div class="input-group mb-2">
				<select name="sections" class="chosen-select" id="" data-placeholder="" multiple>                           
				    <?
				    foreach($element->sections_all as $key => $value){?>
				        <option value="<?=$value->id?>" <?=(in_array($value->id, $selected) ) ? "selected = 'selected'" : "" ;?> ><?=$value->title;?></option>
				    <?}
				    ?>
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
	$('#editInvoiceModal').on('show.bs.modal',function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var invoiceid = button.data('invoiceid')
		var jobid = button.data('jobid')
		var modal = $(this)
		modal.find('.modal-body #id').val(id)
		modal.find('.modal-body #invoiceid').val(invoiceid)
		modal.find('.modal-body #jobid').val(jobid)
	})
</script>
<script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>
<script>
	function showConfig(jobid) {
		if (jobid) {
			$('#note').hide();
			if (jobid==1) {
				$('#job1').show();
				$('#job2').hide();
				$('#job3').hide();
			} else if (jobid==2) {
				$('#job1').hide();
				$('#job2').show();
				$('#job3').hide();
			} else if (jobid==3) {
				$('#job1').hide();
				$('#job2').hide();
				$('#job3').show();
			}
		} else {
			$('#note').hide();
			$('#job1').hide();
			$('#job2').hide();
			$('#job3').hide();
		}
	}
</script>
<?php $this->load->view("footer_view"); ?>