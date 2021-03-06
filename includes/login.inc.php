<?php 
if (isset($_POST['login-submit'])) {

	require 'dbh.inc.php';
	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

    //Error handlers
    //Check if inputs are empty
if (empty($mailuid) || empty($password)) {

		header("Location: ../index.php?error=emptyfields");
		exit();
}
else{

    $sql = 'SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

		header("Location: ../index.php?errorsql");
		exit();

    }else{

    	mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
    	mysqli_stmt_execute($stmt);
    	$result = mysqli_stmt_get_result($stmt);

    	if ($row = mysqli_fetch_assoc($result)) {
    
            //De-hashing the paswrd
    		$pwdCheck = password_verify($password, $row['pwdUsers']);

    		if ($pwdCheck ==false){

 				header("Location: ../index.php?errorwrongpassword");
				exit();   	

    		}
    		elseif($pwdCheck == true){

                    //Starting session to login user 
    			    session_start();
    			    $_SESSION['userID'] = $row['idUsers'];
    			    $_SESSION['userUiD'] = $row['uidUsers'];
 			        header("Location: ../index.php?login=success");
			        exit(); 

    		}
    	}else{

 			header("Location: ../index.php?errornouser");
			exit(); 

    	}
    }
}

}else{

	    header("Location: ../index.php");
		exit();
		
}