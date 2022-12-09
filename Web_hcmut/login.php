<?php
include "db.php";

session_start();

#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click() 

if (isset($_POST["email"]) && isset($_POST["password"])) {
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$password = $_POST["password"];

	//encrypt password
	$hashFormat = "$2y$10$";
	$salt = "iusesomecrazystrings22";
	$hashF_and_salt = $hashFormat . $salt;
	$password = crypt($password, $hashF_and_salt);

	$sql = "SELECT * FROM user_info WHERE email=? AND password=?";
	$stm = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stm, 'ss', $email, $password);
	mysqli_stmt_execute($stm);
	$result = mysqli_stmt_get_result($stm);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	if ($count == 1) {
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["name"] = $row["first_name"] . $row['last_name'];

		//if user is login from page we will send login_success
		echo "successful";
	} else {
		echo "<span style='color:red;'>Tài khoản không hợp lệ!</span>";
		exit();
	}
}
