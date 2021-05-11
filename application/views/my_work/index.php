
<?php
	$idUser = $user['id_user'];
	$queryMyWork = "SELECT * FROM `info_peminjam` WHERE `id_user` = $idUser ORDER BY `jam_mulai` DESC";
	$myWork = $this->db->query($queryMyWork)->result_array();
?>

<div class="container">

    <h3 class="text-center">Pekerjaan Saya</h3>
	<?php if($myWork[0]['jam_selesai'] == 0) : ?>
    <div class="row">
    	<p>Kunci Anda &nbsp<b><?= $myWork[0]['key_odc']; ?></b></p>
    </div>
    <?php endif; ?>

	<form action="<?= base_url('my_work/selesai'); ?>" method="post">
		<div class="form-row">
			<div class="form-group">
				<?php if($myWork[0]['jam_selesai'] == 0) : ?> 
					<input type="submit" name="selesai" value="Selesai Pekerjaan" class="btn btn-primary float-right" >
				<?php endif; ?>
			</div>
		</div>
	</form>

    <div class="table-responsive table-wrapper">
		<table class="table table-bordered table-striped">
			<tr>
				<th scope="col">Jam Mulai</th>
				<th scope="col">Jam Selesai</th>
				<th scope="col">Alamat ODC</th>
				<th scope="col">Pekerjaan</th>
			</tr>
			<?php foreach ($myWork as $mw) : ?>
			<tr>
				<td><?= date('d F Y H:m', $mw["jam_mulai"]); ?></td>
				<td>
					<?php if (date($mw["jam_selesai"]) == 0) : ?>
						<?php echo "Belum Selesai"; ?>
					<?php else : ?>
						<?= date('d F Y H:m', $mw["jam_selesai"]); ?>
					<?php endif; ?>
				</td>
				<td><?= $mw["alamat_odc"] ?></td>
				<td><?= $mw["pekerjaan"]; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>

</div>

</div>

      