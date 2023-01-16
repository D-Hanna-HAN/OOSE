<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php include_once("components/Navbar.php"); ?>

<h1>dit is home</h1>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
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
						<input value="<?php // $Student->DathOfBirth; ?>" name="articlecode" type="text" id="articlecode" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info">Edit this product</button>
					</div>
				</form>
				</div>
			</div>
    </div>


</html>