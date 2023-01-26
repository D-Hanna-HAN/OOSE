<div class="container">
		<div class="">
		<div class="card mt-5">
			<div class="card-header">
				<h2>Your courses</h2>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr>
						<th>name</th>
						<th>description</th>

					</tr>
					<?php foreach ($courses as $course): ?>
						<tr>
							<td>
								<?= $course["name"]; ?>
							</td>
							<td>
								<?= $course["description"]; ?>
							</td>
							<td>
								<a href="/<?= constant('URL_SUBFOLDER') ?>/course/view/<?= $course["id"]; ?>"
									class="btn btn-info">View</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>

</div>