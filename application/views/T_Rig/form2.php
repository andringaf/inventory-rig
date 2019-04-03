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
					<!-- <input type="hidden" id="id"> -->
					<div class="form-group">
						<!-- <select style="width: 100%;" class="form-control" name="id_rig" id="id_rig" autocomplete="off"></select> -->
						<small id="id_rig_help" class="form-text text-muted">Pilih RIG yang masih memiliki SLOT</small>
					</div>
					<div class="form-group">
						<small class="form-text text-muted">- GPU -</small>
						<!-- <select style="width: 100%;" class="form-control" name="id_barang_gpu" id="id_barang_gpu" autocomplete="off"></select> -->
					</div>

					<div class="form-group">
						<small class="form-text text-muted">- Jumlah GPU -</small>
						<!-- <input type="number" class="form-control" name="count_gpu" id="count_gpu"> -->
					</div>
					<div class="form-group">
						<small class="form-text text-muted">- PSU-1 -</small>
						<!-- <select style="width: 100%;" class="form-control" name="id_barang_psu_1" id="id_barang_psu_1" autocomplete="off"></select> -->
					</div>
					<div class="form-group">
						<small class="form-text text-muted">- PSU-2 -</small>
						<!-- <select style="width: 100%;" class="form-control" name="id_barang_psu_2" id="id_barang_psu_2" autocomplete="off"></select> -->
					</div>
					<div class="form-group">
						<small class="form-text text-muted">- RAM -</small>
						<!-- <select style="width: 100%;" class="form-control" name="id_barang_ram" id="id_barang_ram" autocomplete="off"></select> -->
					</div>
					<div class="form-group">
						<small class="form-text text-muted">- Motherboard -</small>
						<!-- <select style="width: 100%;" class="form-control" name="id_barang_mobo" id="id_barang_mobo" autocomplete="off"></select> -->
					</div>
					<div class="form-group">
						<small class="form-text text-muted">- USB -</small>
						<!-- <select style="width: 100%;" class="form-control" name="id_barang_usb" id="id_barang_usb" autocomplete="off"></select> -->
					</div>
					<div class="form-group">
						<small class="form-text text-muted">- SSD -</small>
						<!-- <select style="width: 100%;" class="form-control" name="id_barang_ssd" id="id_barang_ssd" autocomplete="off"></select> -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" id="save">Simpan</button>
						<button type="button" class="btn btn-warning" id="update" style="display: none;">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
