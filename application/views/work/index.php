<!-- <br> -->
<!-- <a href="">Tambah Pekerjaan</a> -->

  <div class="container">
    <h3 class="text-center">Daftar Pekerjaan</h3>

    	<div class="table-responsive table-wrapper">
		<table class="table table-bordered table-striped">
			<tr>
				<th scope="col">STO</th>
				<th scope="col">Alamat ODC</th>
				<th scope="col">Kode ODC</th>
				<th scope="col">Id User</th>
				<th scope="col">User</th>
				<th scope="col">Pekerjaan</th>
				<th scope="col">Jam Mulai</th>
				<th scope="col">Jam Selesai</th>
			</tr>
			<?php foreach ($work as $w) : ?>
			<tr>
				<td><?= $w["tempat_sto"]; ?></td>
				<td><?= $w["alamat_odc"]; ?></td>
				<td><?= $w["kode_odc"]; ?></td>
				<td><?= $w["id_user"]; ?></td>
				<td><?= $w["name"]; ?></td>
				<td><?= $w["pekerjaan"]; ?></td>
				<td><?= date('d F Y H:m', $w["jam_mulai"]); ?></td>
				<td>
					<?php if (date($w["jam_selesai"]) == 0) : ?>
						<?php echo "Belum Selesai"; ?>
					<?php else : ?>
						<?= date('d F Y H:m', $w["jam_selesai"]); ?>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		</div>

  </div>
</div>

<!-- <div class="row">
  <div class="container">
	<table class="table table-bordered">
		<tr>
			<th>Kode ODC</th>
			<th>Id User</th>
			<th>User</th>
			<th>Pekerjaan</th>
			<th>Jam Mulai</th>
			<th>Jam Selesai</th>
		</tr>
		<?php //$i=1; ?>
		<?php //foreach ($work as $w) : ?>
		<tr>
			<td><?//= $w["kode_odc"]; ?></td>
			<td><?//= $w["id_user"]; ?></td>
			<td><?//= $w["name"]; ?></td>
			<td><?//= $w["pekerjaan"]; ?></td>
			<td><?//= $w["jam_mulai"]; ?></td>
			<td><?//= $w["jam_selesai"]; ?></td>
		</tr>
		<?php //$i++; ?>
		<?php //endforeach; ?>
	</table>
  </div>
</div>
 -->