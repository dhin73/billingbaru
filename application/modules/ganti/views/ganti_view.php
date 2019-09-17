<?php $this->load->view("header_view"); ?>

<!-- Page Heading -->
<div class="row">
  <div class="col">
    <h1 class="h3 mb-2 text-gray-800">Ganti Kontak</h1>
    <p class="mb-4">List Ganti Kontak Bukan dari Kontak Terdaftar</p>
  </div>
  <div class="col text-right">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addGantikontakModal">Tambah</button>
  </div>
</div>

<?php 
  $data=$this->session->flashdata('successMsg');
  if($data!=""){ 
?>
  <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
<?php } ?>
 
<?php 
  $data2=$this->session->flashdata('errorMsg');
  if($data2!=""){ 
?>
  <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>
 
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm table-hover datatab" id="mydata" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Nomor</th>
              <th class="text-center">Domain</th>
              <th class="text-center">ID Tiket</th>
              <th class="text-center">Status</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($gantikontakResult)): ?>
              <?php $no=1; foreach($gantikontakResult as $row): ?>
              <tr class="odd gradeX">
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->domain; ?></td>
                  <td><?php echo $row->ticketid; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td class="text-center">

                          <a data-toggle="modal" data-target="#editGantikontakModal<?=$row->id;?>" class="btn btn-sm"><i class="fas fa-edit"></i> Edit</a>

                          <a href="<?php echo site_url('ganti/hapus/'.$row->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?=$row->domain;?> ?');" class="btn btn-sm"> Hapus <i class="fa fa-trash"></i></a>
                  </td>
              </tr>
              <?php endforeach; endif; ?>
          </tbody>
      </table>
    </div>
  </div>
</div>

 
<!-- Modal - Add  -->
<div class="modal fade" id="addGantikontakModal" tabindex="-1" role="dialog" aria-labelledby="addGantikontakModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addGantikontakModalLabel">Tambah Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?=base_url('ganti/add');?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="status" id="status" value="Pending" required>
          
          <div class="form-group">
            <label for="ticketid" class="control-label">Domain</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" name="domain" id="domain" placeholder="Domain/layanan yg dipindahkan" required>
            </div>
          </div>
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
            <label for="ticketid" class="control-label">URL Tiket</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" name="url" id="url" placeholder="URL Tiket" required>
            </div>
          </div>
          <div class="form-group">
                  <label for="name">Keterangan</label>
                  <textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
                   name="keterangan" placeholder="Keterangan"></textarea>
                  <div class="invalid-feedback">
                    <?php echo form_error('keterangan') ?>
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
 
<!-- Modal - Edit  -->
<?php 
  if (is_array($gantikontakResult)): 
  foreach($gantikontakResult as $row): 
?>
<div class="modal fade" id="editGantikontakModal<?=$row->id;?>" tabindex="-1" role="dialog" aria-labelledby="editGantikontakModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editGantikontakModalLabel">Perbarui Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?=base_url('ganti/edit');?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="<?=$row->id;?>">
          <div class="form-group">
            <label for="ticketid" class="control-label">Domain</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" name="domain" id="domain" value="<?=$row->domain;?>" placeholder="Domain/layanan yg dipindahkan" required>
            </div>
          </div>
          <div class="form-group">
            <label for="ticketid" class="control-label">Status</label>
            <div class="input-group mb-2">
              <select name="status">
                <option value="Pending" <?php if($row->status == "Pending") { echo "selected";} ?>>Pending</option>
                <option value="Done" <?php if($row->status == "Done") { echo "selected";} ?>>Done</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Keterangan</label>
            <textarea name="keterangan" id="keterangan"><?=$row->keterangan;?></textarea>
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
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>

<?php $this->load->view("footer_view"); ?>