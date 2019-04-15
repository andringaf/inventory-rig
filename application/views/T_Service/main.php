<style>
	table.dataTable tbody td {
		vertical-align: top;
	}
</style>

<div id="tab-alert"></div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">
		<?php echo $title; ?>
	</h1>
</div>

<!-- <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
	<span class="icon text-white-50">
		<i class="fas fa-plus"></i>
	</span>
	<span class="text">Tambah Data</span>
</button> -->
<hr class="divider">

<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
                    <th width="5%">No</th>
					<th width="30%">Nama Barang</th>
					<th width="15%">Tipe Barang</th>
					<th width="7%">Jumlah</th>
					<th width="15%">Tanggal Masuk</th>
					<th width="8%">RIG</th>
					<th width="10%">Kondisi</th>
                    <th width="10%">Aksi</th>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view($form, array('action' => $action)); ?>

<script type="text/javascript">
	$(document).ready(function () {

		// Datatables
		$('#dataTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: '<?php echo site_url($class . '/getData') ?>',
				dataSrc: 'data'
			},
			columns: [
				{ 
					data: 'id_barang',
					render: function( data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{ data: 'name_barang' },
                { data: 'name_type' },
				{ data: 'count' },
				{ data: 'inputed_at',
					render: function(data, type, row) {
						let dt = new Date(data),
							m = '' + dt.getMonth() + 1,
							d = '' + dt.getDate(),
							y = '' + dt.getFullYear();
						if(m.length < 2 ) m = '0' + m;
						if(d.length < 2 ) d = '0' + d;
						return [d, m, y].join(' - ');
					}
				},
				{ data: 'name_rig',
					render: function(data, type, row) {
						if(data == '', data == null) {
							return '-';
						}
						return data;
					}
				},
				{ data: 'name_status_barang' },
				{ data: 'id_barang',
					render: function (data, type, row) {
						let button =`
							<button onclick="editData(${data})" class="btn btn-warning btn-circle btn-sm" title="Transfer Kembali"><i class="fas fa-exchange-alt"></i></button>`;
						return button;
					}
				}
			],
		});

		// Modal Function when hidden
		$('#addModal').on('hidden.bs.modal', function(e) {
			$('#dataTable').DataTable().ajax.reload();
			$('#form_status').trigger('reset');
			$("#id_type").val(null).trigger("change");
			$("#id_status_barang").val(null).trigger("change");
			$("#id_barang").val(null).trigger("change");
			$('#save').css('display', 'block');
			$('#update').css('display', 'none');
		})
	});	

	function editData(data) {
		$.ajax({
			type: 'POST',
			url: '<?php echo $edit; ?>',
			data: { id: data },
		})
		.done(function(result) {
			$('#addModal').modal('toggle');
			$('#id').val(result.data[0].id);
			$('#serial_number').val(result.data[0].serial_number);
			$('#id_barang').val(result.data[0].id_barang);
			$('#id_tipe').val(result.data[0].id_type);
			$('#id_rig').val(result.data[0].id_rig);
			$('#id_t_rig').val(result.data[0].id_t_rig);
			$('#count').val(result.data[0].count);
			$('#jumlah_gpu').val(result.data[0].count);
		})
	}

	function defaultValueSelect2(fieldId, id, val) {
		var $newOption = $("<option selected='selected'></option>").val(id).text(val);
		$(fieldId).append($newOption).trigger('change');
	}

	function trasferservice(param){
		if ($('#id_tipe').val() == '3' && param == 'rig') {
			$('#addModalJumlah').modal('toggle');
		}else{
			actionTrasfer(param);
		}
	}

	function actionTrasfer(param){
		$.ajax({
				type: 'POST',
				url: '<?php echo $update; ?>',
				data: { 
	                id: $('#id').val(), 
	                id_type: $('#id_tipe').val(),
	                id_barang: $('#id_barang').val(),
					id_rig: $('#id_rig').val(),
					id_t_rig: $('#id_t_rig').val(),
					place: param,
					serial_number: $('#serial_number').val(),
					count: $('#count').val(),
					jumlah_gpu: $('#jumlah_gpu').val(),
	            }
			})
			.done(function(result) {
			$('#dataTable').DataTable().ajax.reload();
			$('#addModal').modal('toggle');
				if(!result.error) {
					$('#tab-alert').append(`
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Barang Sukses Di Ditransfer </strong>
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
	}

</script>
