<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
		<!-- Latest compiled and minified CSS & JS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/
			/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<script src="//code.jquery.com/jquery.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/
			/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		<body>
			<form action="<?=site_url('Sagarcontroller/update') ?>" method="POST" >
				<legend>Form title</legend>
				<input type="hidden" class="form-control" id="" placeholder="Input field" value="<?=$data['id']?>">
				<div class="form-group">
					<label for="">Contact Number: </label>
					<input type="number" class="form-control" id="" placeholder="Input field" value="<?=$data['contactno']?>">
				</div>
				<div class="form-group">
					<label for="">Contact Name: </label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="<?=$data['contactname']?>">
				</div>
				<div class="form-group">
					<label for="">Address (Optional): </label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="<?=$data['address']?>">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			
		</body>
	</html>