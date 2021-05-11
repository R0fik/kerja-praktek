	<div class="container">
		<div class="row mt-3">
			<div class="col-sm-12">

			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="elert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
				<form action="<?= base_url('add_work/tambah'); ?>" method="post">
				<div class="container">

				  <div class="form-row">
				    <div class="form-group col-sm-12">
				    	<?php $kunci = $this->db->get('kunci')->result_array(); ?>
				      <label for="alamatOdc">Alamat ODC</label>
				      <select class="form-control custom-select" id="alamatOdc" name="alamatOdc">
				        <option selected>Alamat ODC</option>
					  	<?php foreach ($kunci as $key) : ?>
				        <option>
				        	<div><?= $key['alamat_odc']; ?></div>
				        </option>
						<?php endforeach; ?>
				    	</select>
				    </div>
				  </div>

					<div class="form-row">
						<div class="form-group col-sm-12">
					      <label for="pekerjaan">Pekerjaan</label>
					      <input id="pekerjaan" type="text" name="pekerjaan" class="form-control">
					    </div>
					</div>

					<div class="form-row">
						<div class="form-group col-sm-12">
						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Pekerjaan</button>
						</div>
					</div>

				</div>
				</form>
			</div>
		</div>
	</div>
</div>