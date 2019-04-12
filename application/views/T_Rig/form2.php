<!-- Modal -->
<div class="modal fade" id="addModalKondisi" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Kondisi Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form_status">
					<input type="hidden" name="id_kondisi" id="id_kondisi">
				<div class="row">
					<div class="col-sm"> 
					<input type="hidden" id="id_rig_kondisi">
					<input type="hidden" name="id_barang_gpu_kondisi" id="id_barang_gpu_kondisi">
					<input type="hidden" name="id_barang_psu_1_kondisi" id="id_barang_psu_1_kondisi">
					<input type="hidden" name="id_barang_psu_2_kondisi" id="id_barang_psu_2_kondisi">
					<input type="hidden" name="id_barang_ram_kondisi" id="id_barang_ram_kondisi">
					<input type="hidden" name="id_barang_mobo_kondisi" id="id_barang_mobo_kondisi">
					<input type="hidden" name="id_barang_usb_kondisi" id="id_barang_usb_kondisi">
					<input type="hidden" name="id_barang_ssd_kondisi" id="id_barang_ssd_kondisi">
					<input type="hidden" name="count_gpu_kondisi" id="count_gpu_kondisi">
						<table class="table table-hover">
					    <thead>
					      <tr>
					        <th>Type</th>
					        <th>Name</th>
					        <th></th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>GPU</td>
					        <td><span id="gpu"></span></td>
					        <td>
					        	<a id="button_gpu" onclick="transfer(1)" class="btn btn-warning btn-circle btn-sm float-right" style="color: white;"><i class="fas fa-exchange-alt"></i></a>
					        </td>
					      </tr>      
					      <tr>
					        <td>PSU 1</td>
					        <td><span id="psu-1"></span></td>
					        <td>
					        	<a id="button_psu_1" onclick="transfer(2)" class="btn btn-warning btn-circle btn-sm float-right" style="color: white;"><i class="fas fa-exchange-alt"></i></a>
					        </td>
					      </tr>
					      <tr>
					        <td>PSU 2</td>
					        <td><span id="psu-2"></span></td>
					        <td>
					        	<a id="button_psu_2" onclick="transfer(3)" class="btn btn-warning btn-circle btn-sm float-right" style="color: white;"><i class="fas fa-exchange-alt"></i></a>
					        </td>
					      </tr>
					      <tr>
					        <td>RAM</td>
					        <td><span id="ram"></span></td>
					        <td>
					        	<a id="button_ram" onclick="transfer(4)" class="btn btn-warning btn-circle btn-sm float-right" style="color: white;"><i class="fas fa-exchange-alt"></i></a>
					        </td>
					      </tr>
					      <tr>
					        <td>Motherboard</td>
					        <td><span id="mtb"></span></td>
					        <td>
					        	<a id="button_mobo" onclick="transfer(5)" class="btn btn-warning btn-circle btn-sm float-right" style="color: white;"><i class="fas fa-exchange-alt"></i></a>
					        </td>
					      </tr>
					      <tr>
					        <td>USB</td>
					        <td><span id="usb"></span></td>
					        <td>
					        	<a id="button_usb" onclick="transfer(6)" class="btn btn-warning btn-circle btn-sm float-right" style="color: white;"><i class="fas fa-exchange-alt"></i></a>
					        </td>
					      </tr>
					      <tr>
					        <td>SSD</td>
					        <td><span id="ssd"></span></td>
					        <td><a id="button_ssd" onclick="transfer(7)" class="btn btn-warning btn-circle btn-sm float-right" style="color: white;"><i class="fas fa-exchange-alt"></i></a></td>
					      </tr>
					    </tbody>
					  </table>
					</div>

				    
				</div>
					
					<div class="modal-footer">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="addSerialTransfer" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Masukan No Serial Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<small class="form-text text-muted">- Serial Number -</small>
				<input type="text" class="form-control" id="serial_number">
				<small id="label_count" class="form-text text-muted">- Jumlah -</small>
				<input type="number" class="form-control" id="count_kondisi">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<input onclick="trasferAction()" type="submit" class="btn btn-primary" value="Transfer">
			</div>
		</div>
	</div>
</div>
	
<script type="text/javascript">
    var id_tf_barang = '';
    var field = '';
    var name_barang = '';
	function transfer(id){
		var j = $('#count_gpu_kondisi').val();
		$('#count_kondisi').val(j);
		switch(id) {
		  case 1:
		   id_tf_barang = $('#id_barang_gpu_kondisi').val();
		   field = 'id_barang_gpu';
		   name_barang = document.getElementById("gpu").innerText;
		    break;
		  case 2:
		   id_tf_barang = $('#id_barang_psu_1_kondisi').val();
		   field = 'id_barang_psu_1';
		   name_barang = document.getElementById("psu-1").innerText;
		    break;
		  case 3:
		   id_tf_barang = $('#id_barang_psu_2_kondisi').val();
		   field = 'id_barang_psu_2';
		   name_barang = document.getElementById("psu-2").innerText;
		    break;
		  case 4:
		   id_tf_barang = $('#id_barang_ram_kondisi').val();
		   field = 'id_barang_ram';
		   name_barang = document.getElementById("ram").innerText;
		    break;
		  case 5:
		   id_tf_barang = $('#id_barang_mobo_kondisi').val();
		   field = 'id_barang_mobo';
		   name_barang = document.getElementById("mtb").innerText;
		    break;
		  case 6:
		   id_tf_barang = $('#id_barang_usb_kondisi').val();
		   field = 'id_barang_usb';
		   name_barang = document.getElementById("usb").innerText;
		    break;
		  case 7:
		   id_tf_barang = $('#id_barang_ssd_kondisi').val();
		   field = 'id_barang_ssd';
		   name_barang = document.getElementById("ssd").innerText;
		    break;  
		}
			if (field == 'id_barang_gpu') {
				$('#addSerialTransfer').modal('toggle');
				document.getElementById("count_kondisi").style.display = "block";
				document.getElementById("label_count").style.display = "block";
				}else{
				$('#addSerialTransfer').modal('toggle');
				document.getElementById("count_kondisi").style.display = "none";
				document.getElementById("label_count").style.display = "none";
		  		$('#count_kondisi').val(1);

			}
		}

		function trasferAction(){
			if($('#serial_number').val() == '' || $('#serial_number').val() == null) {
				$.confirm({
					title: 'Warning!',
					content: 'Serial Number Tidak Boleh Kosong!',
					buttons: {
						ok: function () {
						},
					}
				});
			} else {
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url(); ?>/T_Rig/transferService',
					data: { 
						id_rig: $('#id_rig_kondisi').val(),
						serial_number: $('#serial_number').val(),
						id_barang: id_tf_barang,
						field: field,
						name_barang: name_barang,
						id: $('#id_kondisi').val(),
						jumlah: $('#count_kondisi').val(),
						jumlah_awal: $('#count_gpu_kondisi').val(),
					}
				})
				.done(function(result) {
					$('#addSerialTransfer').modal('hide');	
					$('#addModalKondisi').modal('hide');
					$('#dataTable').DataTable().ajax.reload();
					if(!result.error) {
						$('#tab-alert').append(`
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong> Barang Berhasil di Transfer </strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>`);
					} else {
						$('#tab-alert').append(`
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong> Barang Gagal di Transfer </strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>`);
					}
					setTimeout(() => {
						$('.alert').alert('close');
					}, 2000);
				});
			}
		}
</script>
