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

<!-- <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal" onclick="cekid();">
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
					<tr>
						<th width="5%">No</th>
						<th>Barang</th>
						<th>Status</th>
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

<script type="text/javascript">
	$(document).ready(function () {

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
				{ data: 'name_barang' },
				{ data: 'status_name' },
				{ data: 'id_gudang',
					render: function (data, type, row) {
						let button =`
							<button onclick="editData(${data})" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></button>`;
						return button;
					}
				}
			],
		});
	});	

		function editData(data) {
			let dataStatus = [
				{id: 0, text: '-- Pilih Status --' },
				{id: 1, text: 'OUT' },
				{id: 2, text: 'SERVICE' }
			];
			$.ajax({
				type: 'GET',
				url: '<?php echo $dataSource; ?>' + '/' + data,
				data: { id: data },
			})
			.done(function(result) {
				$('#id_gudang').val(result.data[0].id_gudang);
				defaultValueSelect2("#id_barang", result.data[0].id_barang, result.data[0].name_barang)
				$('#status').select2({data: dataStatus});
				if(result.data[0].status_id == null || result.data[0].status_id == ''){
					$('#status').val(0);
					$('#status').trigger('change');
				}else{
					$('#status').val(result.data[0].status_id);
					$('#status').trigger('change');
				}
				
				
				$('#addModal').modal('toggle');
			})
	}

	$('#update').on('click', function() {
		$.ajax({
			type: 'POST',
			url: '<?php echo $update; ?>',
			data: { 
                id_gudang: $('#id_gudang').val(), 
                id_barang: $('#id_barang').val(), 
				id_status: $('#status').val()
            }
		})
		.done(function(result) {
			$('#dataTable').DataTable().ajax.reload();
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

	function defaultValueSelect2(fieldId, id, val) {
		var $newOption = $("<option selected='selected'></option>").val(id).text(val);
		$(fieldId).append($newOption).trigger('change');
	}

</script>
