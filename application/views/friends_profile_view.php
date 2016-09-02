<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $friends_profile[0]['alias']; ?></title>
</head>
<body>
<a href="/users/logout">Logout</a>
<a href="/friends/index">Home</a>
 <h1><?= $friends_profile[0]['alias']; ?>'s Profile</h1>
 <p>Name: <?= $friends_profile[0]['name']; ?></p>
 <p>Email: <?= $friends_profile[0]['email']; ?></p>
</body>
</html>