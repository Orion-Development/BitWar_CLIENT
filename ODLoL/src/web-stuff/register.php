	<form method="post">
		<input type="text" name="username" placeholder="Username" required>
		<input type="password" name="password" placeholder="Password" required>
		<input type="submit" value="Register!" name="submit">
	</form>
<?php 
include_once 'inc.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$query = "SELECT * FROM $table WHERE login = '$username'";
	if ($result = mysql_query($query)) {
		if (mysql_num_rows($result) == 1) {
			echo "Username is already taken!";
			break;
		}
		$query = "INSERT INTO $table(username, password) VALUES ('$username', '$password')";
		mysql_query($query);
		if (mysql_error())
			die(mysql_error());
	}
}
?>