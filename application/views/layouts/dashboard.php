<style>
.progress {
    display: block;
    text-align: center;
    width: 0;
    height: 3px;
    background: #4a6fdc;
    transition: width .3s;
}
.progress.hide {
    opacity: 0;
    transition: opacity 1.3s;
}
</style>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">GPU</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><span id="id_type_3"></span></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-save fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PSU</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><span id="id_type_psu"></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-plug fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Motherboard</div>
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><span id="id_type_5"></span></div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-microchip fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">RAM</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><span id="id_type_4"></span></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-memory fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<hr>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data</h1>
</div>

<div class="row">
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SSD</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><span id="id_type_7"></span></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-hdd fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">USB</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><span id="id_type_6"></span></div>
					</div>
					<div class="col-auto">
						<i class="fab fa-usb fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">RIG</h1>
</div>

<div class="row" id="card-rig" style="display: none;">
</div>

<div class="col-xl-3 col-md-6 mb-4" id="button-add-rig">
	<div class="card h-100 py-2" style="background: transparent !important; border-color: transparent !important;">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
				<div class="col mr-2">
					<a href="<?php echo base_url('master-rig/index'); ?>" class="btn btn-primary btn-circle btn-lg" title="Tambah Rig">
						<i class="fas fa-plus"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(e) {
		$(document).tooltip({
			position: {
				at: 'center top'
			}
		});
		// $('#card-rig').hide();
		$.ajax({
			url: '<?php echo $rig_result; ?>',
			method: 'GET',
			dataType: 'json',
		})
		.done(function(res) {
			let num = 1;
			let data = res.data;

			$.map(data, function(item) {
				// $('#card-rig').hide();
				$('#card-rig').prepend(cardRigList(item.id_rig, item.name_rig, item.items_value));
				$('#card-rig').show('slow');
				// $('#rig-' + item.id_rig).show('slow');
				$('#rig-' + item.id_rig).click(function(e) {
					e.preventDefault();
					window.location.href = '<?php echo base_url('master-rig-trans/index/'); ?>' + item.id_rig;
				});
			})


		})
		$.ajax({
			url: '<?php echo $count_result; ?>',
			method: 'GET',
			dataType: 'json',
		})
		.done(function(res) {
			let num = 1;
			let data = res.data;
			let psu = 0;

			$.map(data, function(item) {
				if (item.id_type == 1 || item.id_type == 2 ) {
				psu =  psu + parseInt(item.count);
				}else{
				$('#id_type_' + item.id_type).text(item.count);
				}
			});
			$('#id_type_psu').text(psu);

		});

	});

	function cardRigList(id, title, count) {
		let total_count = 13;
		let color 		= '#4a6fdc';
		let sum 		= Math.trunc(( count / total_count ) * 100);

		if(sum == 100) {
			color = '#e63462';
		}

		let html = 	`<div class="col-xl-3 col-md-6 mb-4" id="rig-${id}" title="RIG ${title}" style="cursor: pointer">`;
			html += `<div class="card border-left-primary shadow h-100 py-2">`;
			html += `<div class="card-body">`;
			html += `<div class="row no-gutters align-items-center">`;
			html += `<div class="col mr-2">`;
			html += `<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><strong><h6>${title}</h6></strong></div>`;
			html += `<div class="h5 mb-0 font-weight-bold text-gray-800"><h6><span style="width: ${sum}%; background-color: ${color}; color: white" class="badge">${count}</span></h6></div>`;
			html += `</div>`;
			html += `<div class="col-auto">`;
			html +=	`<i class="fas fa-server fa-2x text-gray-300"></i>`;
			html +=	`</div>`;
			html +=	`</div>`;
			html +=	`</div>`;
			html +=	`</div>`;
			html +=	`</div>`;

		return html;
	}

</script>