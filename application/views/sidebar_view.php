<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Laporan Billing</div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<!-- Divider -->
	<hr class="sidebar-divider">
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTicket" aria-expanded="true" aria-controls="collapseTicket"><i class="fas fa-fw fa-ticket-alt"></i><span>Ticket</span></a>
		<div id="collapseTicket" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?php echo base_url('ticket');?>">Ticket List</a>
				<?php if ($this->session->userdata('level')==='1') { ?>
				<a class="collapse-item" href="<?php echo base_url('ticket/job');?>">Ticket Jobs</a>
				<?php } ?>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('invoice'); ?>"><i class="fas fa-fw fa-file-invoice"></i><span>Invoice</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#"><i class="fas fa-fw fa-comments"></i><span>Chat</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#"><i class="fas fa-fw fa-calendar-alt"></i><span>Rekap Bulanan</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('ganti');?>"><i class="fas fa-fw fa-exchange-alt"></i><span>Ganti Kontak</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser"><i class="fas fa-fw fa-users"></i><span>User</span></a>
		<div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?=base_url('user/profile');?>">Profile</a>
				<?php if ($this->session->userdata('level')==='1') { ?>
				<a class="collapse-item" href="<?=base_url('user/manage');?>">Manage User</a>
				<?php } ?>
			</div>
		</div>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
</ul>