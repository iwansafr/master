<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>upload</title>
</head>
<body>
	<?php pr($_FILES) ?>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="excel" accept=".xls,.xlsx">
		<button type="submit">Submit</button>
	</form>
</body>
</html>