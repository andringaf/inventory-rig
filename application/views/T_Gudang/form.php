<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Tambah / Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form_status">
					<input type="hidden" id="id">
					<div class="form-group">
						<small class="form-text text-muted">- Nama Barang -</small>
						<select style="width: 100%;" class="form-control" name="id_barang" id="id_barang" autocomplete="off"></select>
					</div>
					<div class="form-group">
						<small class="form-text text-muted">- Status -</small>
						<select style="width: 100%;" class="form-control" name="status" id="status" autocomplete="off"></select>
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
