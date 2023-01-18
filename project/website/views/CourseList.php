<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>All templates</h2>
			<a href="/<?= constant('URL_SUBFOLDER') ?>/course_template/create/">Create new template</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>name</th>
					<th>description</th>

				</tr>
				<?php foreach ($templateCourses as $course): ?>
					<tr>
						<td>
							<?= $course->getName(); ?>
						</td>
						<td>
							<?= $course->getDescription(); ?>
						</td>
						<td>
							<a href="/<?= constant('URL_SUBFOLDER') ?>/course_template/edit/<?= $course->getId() ?>"
								class="btn btn-info">Edit</a>
							<a onclick="return confirm('Weet je zeker dat je deze Student wilt verwijderen?')"
								href="/<?= constant('URL_SUBFOLDER') ?>/course_template/delete/<?= $course->getId() ?>"
								class='btn btn-danger'>Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	<div class="card mt-5">
		<div class="card-header">
			<h2>All courses</h2>
			<a href="/<?= constant('URL_SUBFOLDER') ?>/course/create/">Create new course</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>name</th>
					<th>description</th>

				</tr>
				<?php foreach ($templateCourses as $course): ?>
					<tr>
						<td>
							<?= $course->getName(); ?>
						</td>
						<td>
							<?= $course->getDescription(); ?>
						</td>
						<td>
							<a href="/<?= constant('URL_SUBFOLDER') ?>/course/edit/<?= $course->getId() ?>"
								class="btn btn-info">Edit</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>