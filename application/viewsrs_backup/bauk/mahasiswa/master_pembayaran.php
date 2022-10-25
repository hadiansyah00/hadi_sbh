<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-1">
				<img style="width: 70px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>">
			</div>
			<div class="box-body col-md-5">
				<table class="table">
					<tbody>
						<?php foreach ($detil as $row) : ?>
							<tr>
								<th>Nama Mahasiswa</th>
								<td> : </td>
								<td><?php echo $row->nim; ?> - <?php echo $row->nama_mhs; ?></td>
							</tr>
							
						
						<?php endforeach; ?>
						<tr>
							<th>Tahun Akademik</th>
							<td> : </td>
							<td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
						</tr>
					</tbody>

				</table>
			</div>
		</div>

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Form Pembayaran</h1>
							<div class="sparkline8-outline-icon">
							    <span title="Tambah Data Pembayaran"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ModalBayar"><i class="fa fa-plus"></i> Update Total Tagihan </a>
								</span>
								<span title="Tambah Data Pembayaran"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i> Input Cicilan Pembayaran </a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('bauk/Pembayaran'); ?>" class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
								</span>
								<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<div class="sparkline8-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
								<thead>
									<tr>
										<th data-field="no">No</th>
										<th data-field="tgl_bayar">Tanggal Pembayaran</th>
										<th data-field="angsuran">Pembayaran</th>
								
										<?php $btn = $this->db->get('set_krs')->row_array();
										if ($btn['hide_btn_del'] == 0) {
										} else { ?>
											<th>Aksi</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
								    
									<?php $i = 1;
									    $sisa = 0;
	                                    error_reporting(0);
									   $total_cicilan = 0;
									foreach ($list as $row) { 
									    
								    	$total_cicilan = $total_cicilan + $row->angsuran;
								    	?>
									
											<tr>
												<td><?php echo $i++; ?></td>
											
												<td><?php echo format_indo($row->tgl_bayar, date('Y-m-d')); ?></td>
												<td>Rp. <?php echo number_format($row->angsuran,0,',','.'); ?>,-</td>
										
												<td>
													<a class="btn-sm btn-danger" href="<?php echo base_url('bauk/Pembayaran/delete/' . $row->id_pmb); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
												</td>
												<?php 
											
												$sisa = $total_cicilan - $row->total 
												?>
											
											    
											<?php } ?>
											 
											</tr>
									<tr>
								  <td colspan="2"  align="center"><strong>Total Pembayaran</strong></td>
							      <td colspan="2"> <strong>Rp. <?php echo number_format($total_cicilan,0,',','.'); ?>,-</strong></td>
								</tr>
									<tr>
								  <td colspan="2"  align="center"><strong>Jumlah Tagihan</strong></td>
							      <td colspan="2"> <strong>Rp. <?php  echo number_format($row->total,0,',','.'); ?>,-</strong></td>
								</tr>
									<tr>
								  <td colspan="2"  align="center"><strong>Sisa Pembayaran</strong></td>
							      <td colspan="2"> <strong>Rp. <?php echo number_format($sisa ,0,',','.'); ?>,-</strong></td>
								</tr>

								</tbody>
								
							</table>
						
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Data table area End-->





<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form Input Pembayaran</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">

							<?php foreach ($detil as $row) { ?>
								<form action="<?php echo base_url('bauk/Pembayaran/insertCicilan/' . $row->id_mahasiswa . '/'); ?>" method="post">
								
								<?php } ?>
                   
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-6">
										 
											<label class="login2 pull-left pull-left-pro">Tgl Bayar</label>
										</div>
										<div class="col-lg-12">
										  
											<input type="date" class="form-control" name="tgl_bayar" placeholder="Masukan Tanggal Pembayaran">
										</div>
									</div>
								</div>
                            	<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-6">
											<label class="login2 pull-left pull-left-pro">Jumlah Bayar </label>
										</div>
										<div class="col-lg-12">
											<input type="text"  name="angsuran" class="form-control">
										</div>
									</div>
								</div>
                            

                            

						</div>
					</div>
				</div>
			</div>
			


			<div class="container">
				<div class="row">
					<div class="col-lg-4">
					</div>
					<div class="col-lg-4">
						<a href="#" data-dismiss="modal" class="btn btn-warning"><i class="fa fa-refresh"></i> Batal</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
					<div class="col-lg-4">
					</div>
				</div>
				<br><br>
			</div>
			</form>
		</div>
	</div>
</div>



<div id="ModalBayar" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form  Total Pembayaran</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">

							<?php foreach ($detil as $row) { ?>
								<form action="<?php echo base_url('bauk/Pembayaran/insertAwal/' . $row->id_mahasiswa . '/'); ?>" method="post">
								
								<?php } ?>
                   
				
                            	<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-6">
											<label class="login2 pull-left pull-left-pro">Total Pembayaran</label>
										</div>
										<div class="col-lg-12">
										    	<input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>" class="form-control">	
											<input type="number"  name="total" class="form-control">
										</div>
									</div>
								</div>
                            

						</div>
					</div>
				</div>
			</div>
			


			<div class="container">
				<div class="row">
					<div class="col-lg-4">
					</div>
					<div class="col-lg-4">
						<a href="#" data-dismiss="modal" class="btn btn-warning"><i class="fa fa-refresh"></i> Batal</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
					<div class="col-lg-4">
					</div>
				</div>
				<br><br>
			</div>
			</form>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script>
    <script>
 var uang_dp = document.getElementById("uang_dp");
uang_dp.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatuang_dp() untuk mengubah angka yang di ketik menjadi format angka
  uang_dp.value = formatuang_dp(this.value, "Rp. ");
});

/* Fungsi formatuang_dp */
function formatuang_dp(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    uang_dp = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    uang_dp += separator + ribuan.join(".");
  }

  uang_dp = split[1] != undefined ? uang_dp + "," + split[1] : uang_dp;
  return prefix == undefined ? uang_dp : uang_dp ? "Rp. " + uang_dp : "";
}

</script>
</script>



