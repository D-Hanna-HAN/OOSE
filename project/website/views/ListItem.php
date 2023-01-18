<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>All Students</h2>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>Firstname</th>
					<th>Class</th>
					<th>DateOfBirth</th>

				</tr>
				<?php //foreach($Student as $Student): ?>
				<tr>
					<td>
						<?php //$Student->Firstname; ?>
					</td>
					<td>
						<?php //$Student->Class; ?>
					</td>
					<td>
						<?php //$Student->DateOfBirth;?>
					</td>
					<td>
						<a href="../student/?id=<?php // $Student->Student_id ?>" class="btn btn-info">Edit</a>
						<a onclick="return confirm('Weet je zeker dat je deze Student wilt verwijderen?')"
							href="linknaardeletefunctie/<?php // $Student->Student_id ?>"
							class='btn btn-danger'>Delete</a>
					</td>
				</tr>
				<?php //endforeach; ?>
			</table>
		</div>
	</div>
</div>