
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmail=".$email);
		exit();
	}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
}else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();
}else if ($password !== $passwordRepeat) {
			header("Location: ../signup.php?error=passwordcheck&mail=".$email."&uid=".$username);
		exit();
}else{

    $sql ="SELECT uidUsers from users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

header("Location: ../signup.php?error=sqlerror");
		exit();

    }else{

    	mysqli_stmt_bind_param($stmt, "s", $username);
    	mysqli_stmt_execute($stmt);
    	mysqli_stmt_store_result($stmt);
    	$resultCheck = mysqli_stmt_num_rows($stmt);
    	if ($resultCheck > 0) {

        header("Location: ../signup.php?error=usertaken&mail=".$email);
		exit();
    	}else{

    		$sql ="INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
    		$stmt = mysqli_stmt_init($conn);
    		if (!mysqli_stmt_prepare($stmt, $sql)) {

                 header("Location: ../signup.php?error=sqlerror");
		         exit();
 
    }else{

    	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    	mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    	mysqli_stmt_execute($stmt);

    	header("Location: ../signup.php?signup=success");
		         exit();
    	}
      }

     }
   }

  }

 }

$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    	mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    	mysqli_stmt_execute($stmt);

    	header("Location: ../signup.php?signup=success");
		         exit();

}else{

    	header("Location: ../signup.php");
		         exit();
}
