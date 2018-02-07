
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Connect</title>
</head>
<body>

	<!--Form-->
	<div class="center">
		<form class="center" action="getinfo.php" target="_blank" method="POST">
			<h1>Connection Info</h1>
			<h2>Hostname: </h2>
			<input type="text" name="hostname" value="Hostname" onfocus="this.value=''">
			<br>
			<h2>Username: </h2>
			<input type="text" name="usrname" value="Username" onfocus="this.value=''">
			<br>
			<h2>Password: </h2>
			<input type="text" name="pwd" value="Password" onfocus="this.value=''">
			<br>
			<h2>Database: </h2>
			<input type="text" name="dbname" value="Database" onfocus="this.value=''">
			<br>
			<input type="submit" value="Send">

	</div>
</body>
</html>

