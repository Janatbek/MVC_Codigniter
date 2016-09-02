<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $other_users_profile[0]['alias']; ?></title>
</head>
<body>
<a href="/users/logout">Logout</a>
<a href="/friends/index">Home</a>
 <h1><?= $other_users_profile[0]['alias']; ?>'s Profile</h1>
 <p>Name: <?= $other_users_profile[0]['name']; ?></p>
 <p>Email: <?= $other_users_profile[0]['email']; ?></p>
</body>
</html>