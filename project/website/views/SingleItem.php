<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>Edit this Student</h2>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
					<label for="name">name</label>
					<input value="<?php // $Student->name; ?>" name="name" type="text" id="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="desc">Class</label>
					<input value="<?php // $Student->Class; ?>" name="desc" type="text" id="desc" class="form-control">
				</div>
				<div class="form-group">
					<label for="articlecode">DathOfBirth</label>
					<input value="<?php // $Student->DathOfBirth; ?>" name="articlecode" type="text" id="articlecode"
						class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Edit this product</button>
				</div>
			</form>
		</div>
	</div>
</div>