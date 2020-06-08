<?php
error_reporting(E_ERROR | E_PARSE);
require "header.php";?>

<main>
	<div class="wrapper-main">
		<section class="section-default">
<h1 class="sign">SignUp</h1>
<?php
		if (isset($_GET['error'])) {

 		    if ($_GET['error'] == "emptyfields") {

 		    	echo '<p class="error">Fill in all fields!</p>';

 		    }else if($_GET['error'] == 'invaliduidmail'){

 		    	echo '<p class="error">Invalid username and email!</p>';

 		    }
 		    else if($_GET['error'] == 'invaliduid'){

 		    	echo '<p class="error">Invalid username!</p>';

 		    }
 		    else if($_GET['error'] == 'invalidmail'){

 		    	echo '<p class="error">Invalid email!</p>';

 		    }
 		    else if($_GET['error'] == 'passwordcheck'){

 		    	echo '<p class="error">Your passwords do not match!</p>';

 		    }
 		    else if($_GET['error'] == 'usertaken'){

 		    	echo '<p class="error">Username is already taken!</p>';

 		    }
 		}else if($_GET['signup'] == 'success'){

 			echo '<p class="signupsuccess">Signup success!</p>';

 		} 
 ?>

<form class="signup-form" action="includes/signup.inc.php" method="post">
	<input type="text" name="uid" placeholder="Username">
	<input type="text" name="mail" placeholder="E-mail">
	<input type="password" name="pwd" placeholder="Password">
	<input type="password" name="pwd-repeat" placeholder="Repeat password">
    <button type="submit" name="signup">Signup</button>
</form>
	  </section>
</div>

</main>

<?php
require "footer.php";?>