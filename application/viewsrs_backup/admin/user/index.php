
<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
    <div class="container-fluid">

    	<?php echo $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline8-list shadow-reset">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Data Admin</h1>
                            <div class="sparkline8-outline-icon">
                                <span title="Tambah Data User"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
                                </span>
                                <span title="Refresh"><a href="<?php echo base_url('admin/User'); ?>" class="btn-sm btn-warning" ><i class="fa fa-refresh"></i></a>
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
                                        <th data-field="username">Username</th>
                                        <th data-field="email">Email</th>
                                        <th data-field="level">Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                               		<?php $i=1;
									foreach($users as $row) : ?>
									<tr>
										<td><?php echo $i++; ?></td>
                                        <td><?php echo $row->username; ?></td>
										<td><?php echo $row->email; ?></td>
										<td><?php echo $row->level; ?></td>
                                        <td>
                                        	<a class="btn-sm btn-success" href="<?php echo base_url('admin/User/detil/'.$row->id); ?>"><i class="fa fa-eye"></i></a>
                                        <?php $btn = $this->db->get('set_krs')->row_array();
                                        if($btn['hide_btn_del'] == 0){}else{ ?>
                                            <a class="btn-sm btn-danger" href="<?php echo base_url('admin/User/delete/'.$row->id); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
                                        <?php } ?>
                                        </td>
                                    </tr>
                               	 	<?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="sparkline8-hd">
		                        <div class="main-sparkline8-hd">
		                            
		                            <div class="sparkline8-outline-icon">
		                                <span>Total Admin : </span><?php echo $this->db->get('users')->num_rows(); ?>
		                            </div>
		                            <br>
		                        </div>
		                    </div>

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
                <h4 class="modal-title">Form Tambah Admin</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="all-form-element-inner">


                            <form action="<?php echo base_url();?>admin/user/tambahUser" method="post">
                            
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Username</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="username" placeholder="example" required="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Password</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="password" class="form-control" name="password" placeholder="Input Password" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Email</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Level</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="level" class="form-control">
                                                <option> --Pilih Level-- </option>
                                                <option value="admin"> Admin </option>
                                            </select>
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
                        <a href="#" data-dismiss="modal" class="btn btn-warning"><i class="fa fa-backward"></i> Batal</a>
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