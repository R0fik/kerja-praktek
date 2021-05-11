<div class="container">

	<div class="row">
		<div class="col-sm-12">

			<div class="card">
				<div class="card-header">
				    Ubah Password User
				</div>
				<div class="card-body">

					<form action="" method="post">
						<input type="hidden" name="id" value="<?= $userId['id']; ?>">
					<div class="form-group">
					    <label for="idUser">ID User</label>
					    <input type="text" class="form-control col-sm-3" id="idUser" name="idUser" disabled value="<?= $userId['id_user']; ?>">
				    </div>
				    <div class="form-group">
					    <label for="name">Nama</label>
					    <input type="text" class="form-control col-sm-8" id="name" name="name" disabled value="<?= $userId['name']; ?>">
				    </div>
				    <div class="form-group">
					    <label for="password1">Password</label>
					    <input type="password" class="form-control col-sm-6" id="password1" name="password1">
					    <small class="form-text text-danger"><?= form_error('password1'); ?></small>
				    </div>
				    <div class="form-group">
					    <label for="password2">Repeat Password</label>
					    <input type="password" class="form-control col-sm-6" id="password2" name="password2">
					    <small class="form-text text-danger"><?= form_error('password2'); ?></small>
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