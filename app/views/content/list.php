<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Content List</title>
</head>
<body>
	<table border="1">
		<thead>
			<th>No</th>
			<th>Title</th>
			<th>Content</th>
			<th>Action</th>
		</thead>		
		<tbody>
			<?php foreach ($data as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['title'] ?></td>
					<td><?php echo $value['content'] ?></td>
					<td>
						<a href="delete/<?php echo $value['id'];?>">hapus</a>
						<a href="edit/<?php echo $value['id'];?>">edit</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>