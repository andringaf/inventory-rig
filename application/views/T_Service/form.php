<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Transfer Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form_status">
					<input type="hidden" id="id">
					<input type="hidden" id="id_t_rig">
					<input type="hidden" id="id_barang">
					<input type="hidden" id="id_tipe">
					<input type="hidden" id="id_rig">
					<input type="hidden" id="serial_number">
					<input type="hidden" id="count">
					<div class="text-center">
					<a onclick="trasferservice('gudang')" href="#" class="btn btn-danger btn-icon-split">
						<span class="icon text-white-50">
						<i class="fas fa-arrow-left"></i>
						</span>
						<span class="text">Transfer to Gudang</span>
					</a>
					<a onclick="trasferservice('rig')" href="#" class="btn btn-warning btn-icon-split">
						<span class="icon text-white-50">
						<i class="fas fa-arrow-right"></i>
						</span>
						<span class="text">Transfer to Rig</span>
					</a>
					</div>
					<div class="modal-footer">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>