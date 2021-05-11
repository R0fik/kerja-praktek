<div class="container">
	<h3 class="text-center">Management User</h3>

	<div class="table-responsive table-wrapper mt-2">
		<table class="table table-bordered table-striped">
			<tr>
				<th scope="col" class="text-center">ID User</th>
				<th scope="col" class="text-center">Nama</th>
			</tr>
			<?php foreach ($userTampil as $user) : ?>
			<tr>
				<td class="col-sm-1"><?= $user['id_user']; ?></td>
				<td class="col-sm-6"><?= $user['name']; ?>
					<a href="<?= base_url('man_user/ubah/'); ?><?= $user['id']; ?>" class="badge badge-success float-right mr-1">Ubah Password</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>	
	</div>
</div>

</div>