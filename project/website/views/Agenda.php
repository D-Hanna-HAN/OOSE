<div class="container">
	<div class="">
		<div class="card mt-5">
			<div class="card-header">
				<h2>agenda</h2>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr>
						<th>name</th>
						<th>description</th>
                        <th>type event</th>
                        <th>week</th>

					</tr>
					<?php foreach ($events as $event): ?>
						<tr>
							<td>
								<?= $event["name"]; ?>
							</td>
							<td>
								<?= $event["description"]; ?>
							</td>
							<td>
								<?= $event["event_type"]; ?>
							</td>
							<td>
								<?= $event["week"]; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>