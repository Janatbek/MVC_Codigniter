<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Friends</title>
	<style type="text/css">
		#add{ width: 300px; display: inline-block;}
		label{display:inline-block; width: 130px;} 

		h1{width:700px; display: inline-block;}
		.right{float: right;}
		a{text-decoration: none; margin-top: 20px;}
		table {
			width: 800px;
			margin: 20px 50px 0 50px;
			border-collapse: collapse;
			border:1px solid black;
		}
		table, th, td {
			border-right: 1px solid black;
			height: 30px;
			padding-left: 5px;
			margin-bottom: 20px;
		}
		th {background: #CCC}
		tr:nth-child(even) {background: #EAEAEA}
		tr:nth-child(odd) {background: #FFF}
	</style>
</head>
<body>
	<header>
		<h1>Hello, <?php echo  $name;?> !</h1>
		<a href="/users/logout">Logout</a>
	</header>
	<main>
		<h2>Here is the list of your friends:</h2>
		<table>
			<tr>
				<th>Alias</th>
				<th>Action</th>
			</tr>
			
			<?php 
			foreach ($all_friends as $friend) {
				?>
				<tr>
					<td><?= $friend['alias']; ?></td>
					<td>
						<a href="/friends/view/<?= $friend['id']; ?>">View Profile</a>
						|
						<a href="/friends/delete/<?= $friend['id']; ?>">Remove as Friend</a>	
					</td>
				</tr>
				<?php
			} 
			?>
		</table>
		<hr>
		<h2>Other users not on your friend's list</h2>
		<table>
			<tr>
				<th>Alias</th>
				<th>Action</th>
			</tr>
			<?php 
			foreach ($other_users as $users) {
				?>
				<tr>
					<td><a href="/friends/view_other_users_profile/<?= $users['id']; ?>"><?= $users['alias']; ?></a></td>
					<td>

					<button><a href="/friends/add/<?= $users['id']; ?>">Add as Friend</a></button>
					</td>
				</tr>
				<?php
			} 
			?>
		</table>
	</main>
</body>
</html>