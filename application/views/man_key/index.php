<style>
.table-wrapper {
  max-height: 600px;
  overflow: auto;
  display:inline-block;
}
</style>
<div class="container">
	<h3 class="text-center">Management Kunci ODC</h3>

	<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row mt-2">
			<div class="col-md-8">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('flash'); ?>
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-sm-6">
			<a href="<?= base_url('man_key/tambah'); ?>" class="btn btn-primary">Tambah Kunci</a>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-sm-8">
			<form action="" method="post">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Cari alamat ODC" name="keyword">
					<div class="input-group-append">
				    	<button class="btn btn-primary" type="submit">Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="table-responsive table-wrapper mt-2">
		<table class="table table-bordered table-striped">
			<tr>
				<th scope="col" class="text-center">Kode ODC</th>
				<th scope="col" class="text-center">Kunci ODC</th>
				<th scope="col" class="text-center">Tempat STO</th>
				<th scope="col" class="text-center">Alamat ODC</th>
			</tr>
			<?php foreach ($keyTampil as $key) : ?>
			<tr>
				<td class="col-sm-2"><?= $key['kode_odc']; ?></td>
				<td class="col-sm-1"><?= $key['key_odc']; ?></td>
				<td class="col-sm-2"><?= $key['tempat_sto']; ?></td>
				<td class="col-sm-7"><?= $key['alamat_odc']; ?>
					<a href="<?= base_url('man_key/hapus/'); ?><?= $key['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
					<a href="<?= base_url('man_key/ubah/'); ?><?= $key['id']; ?>" class="badge badge-success float-right mr-1">Ubah</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>

</div>