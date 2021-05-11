<div class="container">

	<div class="row">
		<div class="col-sm-12">

			<div class="card">
				<div class="card-header">
				    Ubah Kunci ODC
				</div>
				<div class="card-body">

					<form action="" method="post">
						<input type="hidden" name="id" value="<?= $kunci['id']; ?>">
					<div class="form-group">
					    <label for="kodeODC">Kode ODC</label>
					    <input type="text" class="form-control col-sm-4" id="kodeODC" name="kodeODC" value="<?= $kunci['kode_odc']; ?>">
					    <small class="form-text text-danger"><?= form_error('kodeODC'); ?></small>
				    </div>
				    <div class="form-group">
					    <label for="kunciODC">Kunci ODC</label>
					    <input type="text" class="form-control col-sm-4" id="kunciODC" name="kunciODC" value="<?= $kunci['key_odc']; ?>">
					    <small class="form-text text-danger"><?= form_error('kunciODC'); ?></small>
				    </div>
				    <div class="form-group">
					    <label for="alamatODC">Alamat ODC</label>
					    <input type="text" class="form-control col-sm-12" id="alamatODC" name="alamatODC" value="<?= $kunci['alamat_odc']; ?>">
					    <small class="form-text text-danger"><?= form_error('alamatODC'); ?></small>
				    </div>
				    <div class="form-group">
					    <label for="tempatSTO">Tempat STO</label>
					    <input type="text" class="form-control col-sm-6" id="tempatSTO" name="tempatSTO" value="<?= $kunci['tempat_sto']; ?>">
					    <small class="form-text text-danger"><?= form_error('tempatSTO'); ?></small>
				    </div>
				    <button class="btn btn-primary" type="submit" name="ubah">
				    	Ubah Data
				    </button>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>

</div>