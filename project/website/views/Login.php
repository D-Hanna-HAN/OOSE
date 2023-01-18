<div class="container">
	<div class="row">
		<div class="col-6">
			<h2>Login as student</h2>
			<?php foreach ($students as $student):
				?>
				<form type="POST" name="login_student" class="p-1">
					<input type="hidden" name="id" value="<?= $student['id'] ?>">
					<input type="hidden" name="type_login" value="student">
					<button class="btn-block btn-dark p-1" type="submit">
						<?= $student["firstname"] . " " . $student["lastname"] ?>
					</button>
				</form>


			<?php endforeach; ?>
		</div>
		<div class="col-6">
			<h2>Login as schooladmin</h2>
			<?php foreach($schooladmins as $schooladmin): ?>

				<form type="POST" name="login_admin" class="p-1">
					<input type="hidden" name="id" value="<?= $schooladmin['id'] ?>">
					<input type="hidden" name="type_login" value="admin">
					<button class="btn-block btn-dark p-1" type="submit">
						<?= $schooladmin["firstname"] . " " . $schooladmin["lastname"] ?>
					</button>
				</form>
				<?php endforeach; ?>
		</div>

	</div>
</div>