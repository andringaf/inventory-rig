<style>
	table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
		vertical-align: middle;
	}
</style>

<div id="tab-alert"></div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">
		<?php echo $title; ?>
	</h1>
</div>

<button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal" onclick="cekid();">
	<span class="icon text-white-50">
		<i class="fas fa-plus"></i>
	</span>
	<span class="text">Tambah Data</span>
</button>
<hr class="divider">

<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>RIG</th>
						<th>Barang</th>
						<th>Jenis</th>
						<th width="10%">Aksi</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view($form, array('action' => $action)); ?>
<?php $this->load->view($form_kondisi, array('action' => $action)); ?>

<script type="text/javascript">
	$(document).ready(function () {

		initSelect2('#id_rig', '#addModal', '<?php echo $rigSource; ?>', 'item.id_rig', 'item.name_rig', '-- Pilih RIG --');
		initSelect2('#id_barang_psu_1', '#addModal', '<?php echo $brgSource; ?>/0/0/1', 'item.id_barang', 'item.name_barang', '-- Pilih PSU - 1 --');
		initSelect2('#id_barang_psu_2', '#addModal', '<?php echo $brgSource; ?>/0/0/2', 'item.id_barang', 'item.name_barang', '-- Pilih PSU - 2 --');
		initSelect2('#id_barang_gpu', '#addModal', '<?php echo $brgSource; ?>/0/0/3', 'item.id_barang', 'item.name_barang', '-- Pilih GPU --');
		initSelect2('#id_barang_ram', '#addModal', '<?php echo $brgSource; ?>/0/0/4', 'item.id_barang', 'item.name_barang', '-- Pilih RAM --');
		initSelect2('#id_barang_mobo', '#addModal', '<?php echo $brgSource; ?>/0/0/5', 'item.id_barang', 'item.name_barang', '-- Pilih Mobo --');
		initSelect2('#id_barang_usb', '#addModal', '<?php echo $brgSource; ?>/0/0/6', 'item.id_barang', 'item.name_barang', '-- Pilih Data USB --');
		initSelect2('#id_barang_ssd', '#addModal', '<?php echo $brgSource; ?>/0/0/7', 'item.id_barang', 'item.name_barang', '-- Pilih Data SSD --');

		$('#form_status').on('submit', function(e) {
			e.preventDefault();			
			$.ajax({
				type: 'POST',
				url: '<?php echo $action; ?>',
				data: $(this).serialize(),
			})
			.done(function(result) {
				$('#addModal').modal('toggle');
				
				if(!result.error) {
					$('#tab-alert').append(`
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>${result.data} </strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>`);
				} else {
					$('#tab-alert').append(`
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>${result.data} </strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>`);
				}
				setTimeout(() => {
					$('.alert').alert('close');
				}, 1500);
			})
		});

		$('#dataTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: '<?php echo $dataSource; ?>',
				dataSrc: 'data'
			},
			columns: [
				{ 
					data: 'id',
					render: function( data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{ data: 'name_rig' },
				{ data: 'name_barang' },
				{ data: 'name_type' },
				{ data: 'id',
					render: function (data, type, row) {
						let button =`
							<button onclick="deleteData(${data})" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
							<button onclick="editData(${data})" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></button>
							<button onclick="editKondisi(${data})" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-search"></i></button>`;
						return button;
					}
				}
			],
		});
	});	

	function deleteData(data) {
		$.confirm({
			title: 'Confirm!',
			content: 'Yakin Akan Menghapus Data ini ?!',
			buttons: {
				confirm: function () {
					$.alert('Confirmed!');
					$.ajax({
						type: 'POST',
						url: '<?php echo $delete?>',
						data: { id: data },
					})
					.done(function(result) {
						$('#dataTable').DataTable().ajax.reload();

						if(!result.error) {
							$('#tab-alert').append(`
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>${result.data} </strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>`);
						} else {
							$('#tab-alert').append(`
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>${result.data} </strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>`);
						}
						setTimeout(() => {
							$('.alert').alert('close');
						}, 1500);
					})
				},
				cancel: function () {
					$.alert('Canceled!');
				},
			}
		});
	}

	function editData(data) {
		$.ajax({
			type: 'POST',
			url: '<?php echo $edit; ?>',
			data: { id: data },
		})
		.done(function(result) {
			$('#addModal').modal('toggle');
			$('#id_rig').attr('disabled', 'disabled');
			$('#save').css('display', 'none');
			$('#update').css('display', 'block');
			$('#id').val(result.data[0].id);
			defaultValueSelect2("#id_rig", result.data[0].id_rig, result.data[0].name_rig)
			defaultValueSelect2("#id_barang_gpu", result.data[0].id_barang_gpu, result.data[0].name_barang_gpu)
			$('#count_gpu').val(result.data[0].count_gpu);
			defaultValueSelect2("#id_barang_gpu", result.data[0].id_barang_gpu, result.data[0].name_barang_gpu)
			defaultValueSelect2("#id_barang_psu_1", result.data[0].id_barang_psu_1, result.data[0].name_barang_psu_1)
			defaultValueSelect2("#id_barang_psu_2", result.data[0].id_barang_psu_2, result.data[0].name_barang_psu_2)
			defaultValueSelect2("#id_barang_ram", result.data[0].id_barang_ram, result.data[0].name_barang_ram)
			defaultValueSelect2("#id_barang_mobo", result.data[0].id_barang_mobo, result.data[0].name_barang_mobo)
			defaultValueSelect2("#id_barang_usb", result.data[0].id_barang_usb, result.data[0].name_barang_usb)
			defaultValueSelect2("#id_barang_ssd", result.data[0].id_barang_ssd, result.data[0].name_barang_ssd)
		})
	}
	function editKondisi(data) {
		$.ajax({
			type: 'POST',
			url: '<?php echo $edit; ?>',
			data: { id: data },
		})
		.done(function(result) {
			$('#addModalKondisi').modal('toggle');
		})
	}

	function initSelect2(elem, modalParent, url, param_id, param_text, placeholder) {
		$(elem).select2({
			dropdownParent: $(modalParent),
			width: 'resolve',
			placeholder: placeholder,
			ajax: {
				url: url,
				dataType: 'json',
				type: 'GET',
				data: function(params) {
					return {
						q: params.term
					}
				},
				processResults: function(data) {
					return {
						results: $.map(data.data, function(item) {
							return {
								text: eval(param_text),
								id: eval(param_id)
							}
						})
					}
				}
			}
		})
	}

	$('#update').on('click', function(e) {
		$.ajax({
			type: 'POST',
			url: '<?php echo $update; ?>',
			data: { 
				id: $('#id').val(),
				id_rig: $('#id_rig').val(),
				id_barang_gpu: $('#count_gpu').val(),
				count_gpu: $('#count_gpu').val(),
				id_barang_psu_1: $('#id_barang_psu_1').val(),
				id_barang_psu_2: $('#id_barang_psu_2').val(),
				id_barang_ram: $('#id_barang_ram').val(),
				id_barang_mobo: $('#id_barang_mobo').val(),
				id_barang_usb: $('#id_barang_usb').val(),
				id_barang_ssd: $('#id_barang_ssd').val(),

			}
		})
		.done(function(result) {
			$('#addModal').modal('toggle');
			if(!result.error) {
				$('#tab-alert').append(`
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>${result.data} </strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`);
			} else {
				$('#tab-alert').append(`
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>${result.data} </strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`);
			}
			setTimeout(() => {
				$('.alert').alert('close');
			}, 1500);
		});
	})

	$('#addModal').on('hidden.bs.modal', function(e) {
		$('#dataTable').DataTable().ajax.reload();
		$('#form_status').trigger('reset');

		$('#id_rig').removeAttr('disabled');
		$('#id_rig').val(null).trigger("change");
		$('#count_gpu').val(null);
		$('#id_barang_gpu').val(null).trigger("change");
		$('#id_barang_psu_1').val(null).trigger("change");
		$('#id_barang_psu_2').val(null).trigger("change");
		$('#id_barang_ram').val(null).trigger("change");
		$('#id_barang_mobo').val(null).trigger("change");
		$('#id_barang_usb').val(null).trigger("change");
		$('#id_barang_ssd').val(null).trigger("change");

		$('#save').css('display', 'block');
		$('#update').css('display', 'none');
	})

	function defaultValueSelect2(fieldId, id, val) {
		var $newOption = $("<option selected='selected'></option>").val(id).text(val);
		$(fieldId).append($newOption).trigger('change');
	}
	function cekid(){
		let id_rig = '<?php echo $id_rig; ?>';
		let name_rig = '<?php echo $name_rig; ?>';
		if (id_rig != '' && name_rig != ''){
			defaultValueSelect2("#id_rig", id_rig,name_rig )
		}
	}

</script>
