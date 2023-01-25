<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>All Students</h2>
                <a href="/<?= constant('URL_SUBFOLDER') ?>/student/create/">Create new student</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>Firstname</th>
					<th>lastname</th>
					<th>birthday</th>

				</tr>
				<?php if(is_array($students)) : foreach($students as $student): ?>
				<tr>
					<td>
						<?= $student["firstname"]; ?>
					</td>
					<td>
						<?= $student["lastname"] ?>
					</td>
					<td>
						<?= $student["birthday"] ?>
					</td>
					<td>
						<a href="/<?= constant('URL_SUBFOLDER') ?>/student/edit/<?= $student["id"] ?>" class="btn btn-info">Edit</a>
					</td>
				</tr>
				<?php endforeach; endif; ?>
			</table>
		</div>
	</div>
</div>