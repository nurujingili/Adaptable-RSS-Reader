


<?php
/**
 * @code adapted from http://php.about.com/od/finishedphp1/ss/php_login_code_2.htm
 * @copyright 2010
 */
require_once('header.php');//call file to with header and footer functions
//display header
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader:Register');
echo "</div>";

?>
 
  <?php // Connects to your Database 
 require_once ('mysql.php');
 //This code runs if the form has been submitted
 if (isset($_POST['submit'])) { 
 
 //This makes sure they did not leave any fields blank
 if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
 		echo ('You did not complete all of the required fields</br>');
		echo("<a href=register.php>Back</a>");
		do_html_footer();
		die;
 	}
 
 // checks if the username is in use
 	if (!get_magic_quotes_gpc()) {
 		$_POST['username'] = addslashes($_POST['username']);
 	}
 $usercheck = $_POST['username'];
 $check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 
 or die(mysql_error());
 $check2 = mysql_num_rows($check);
 
 //if the name exists it gives an error
 if ($check2 != 0) {
 		echo ('Sorry, the username '.$_POST['username'].' is already in use.</br>');
		echo("<a href=register.php>Back</a>");
 			do_html_footer();	
				die;
				}
 // this makes sure both passwords entered match
 	if ($_POST['pass'] != $_POST['pass2']) {
 		echo ('Your passwords did not match.</br> ');
		echo("<a href=register.php>Back</a>");
		do_html_footer();
		die;
 	}
 
 	// here we encrypt the password and add slashes if needed
 	
 	if (!get_magic_quotes_gpc()) {
 		$_POST['pass'] = addslashes($_POST['pass']);
 		$_POST['username'] = addslashes($_POST['username']);
 		}
 // now we insert it into the database
 	$insert = "INSERT INTO users (username, password)
 			VALUES ('".$_POST['username']."', '".$_POST['pass']."')";
 	$add_member = mysql_query($insert);
  

 
 ?>
 

 <p>Thank you, you have registered - you may now  <a href=index.php>login</a>.</p>
 <?php } 
 else {	 ?>
   <div id=feeds>
 
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <table border="0">
	<tr><td><h2>Register</h2></td></tr>
 <tr><td>Username:</td><td>
 <input type="text" name="username" maxlength="60">
 </td></tr>
 <tr><td>Password:</td><td>
 <input type="password" name="pass" maxlength="10">
 </td></tr>
 <tr><td>Confirm Password:</td><td>
 <input type="password" name="pass2" maxlength="10">
 </td></tr>
 <tr><th colspan=2><input type="submit" name="submit" 
value="Register"></th></tr> </table></div>
 </form>
 <div id=content></div>
 <?php
 }
 do_html_footer();
 ?>
 