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

<?php var_dump($students); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
    
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
						<a onclick="return confirm('Weet je zeker dat je deze Student wilt verwijderen?')" href="linknaardeletefunctie/<?php // $Student->Student_id ?>" class='btn btn-danger'>Delete</a>
						</td>
					</tr>
					 <?php //endforeach; ?> 
				</table>
				</div>
			</div>
		</div>

</html>