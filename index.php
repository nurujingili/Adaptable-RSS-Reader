<?php
/**
 * @this code is from http://php.about.com/od/finishedphp1/ss/php_login_code_4.htm, was adapted for the project.
 * @copyright 2010
 */
require_once('header.php');//call file to with header and footer functions
//display header
echo "<div id=header>"; 
do_html_header('Adaptable RSS Reader:Login');
echo "</div>";

?>
<?php 
 // Connects to your Database 
 require_once ('mysql.php');//call to file with mysql connections code
 //Checks if there is a login cookie
 if(isset($_COOKIE['ID_my_site']))
 //if there is, it logs you in and directes you to the members page
 { 	$username = $_COOKIE['ID_my_site']; 
 	$pass = $_COOKIE['Key_my_site'];
 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
 	while($info = mysql_fetch_array( $check )) 	
 		{
 		if ($pass != $info['password']) 
 			{
 			 			}
 		else
 			{
 			header("Location: index.php");
 
 			}
 		}
 }
 //if the login form is submitted 
 if (isset($_POST['submit'])) { // if form has been submitted
 
 // makes sure they filled it in
 	if(!$_POST['username'] | !$_POST['pass']) {
 		echo ('You did not fill in a required field.');
		echo("<p><a href=index.php>Back</a>");
		do_html_footer();
		die;
 
 	}
 	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());
 
 //Gives error if user dosen't exist
 $check2 = mysql_num_rows($check);
 if ($check2 == 0) {
 		echo('That user does not exist in our database. <a href=register.php>Click Here to Register</a>');
		echo("<p><a href=index.php>Back</a>");
		do_html_footer();
		die;
 				}
 while($info = mysql_fetch_array( $check )) 	
 {
    
    $_POST['pass'] = stripslashes($_POST['pass']);
 	$info['password'] = stripslashes($info['password']);
 	
 
 //gives error if the password is wrong
 	if ($_POST['pass'] != $info['password']) {
 		echo ('Incorrect password, please try again.');
		echo("<p><a href=index.php>Back</a>");
		do_html_footer();
		die;
		
 	}
     else 
 { 
 // if login is ok then we add a cookie 
 	 $_POST['username'] = stripslashes($_POST['username']); 
 	 //$hour = time() + 3600; 
 setcookie(ID_my_site, $_POST['username']); 
 setcookie(Key_my_site, $_POST['pass']);	 
 
 //then redirect them to update feeds area 
 
 header("Location: config.php"); 
 } 
 } 
 } 
 
?>	 

 <div id=feeds >
 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
 <table border="0"> 
 <tr><td colspan=2><h2>Login</h2></td></tr> 
 <tr><td>Username:</td><td> 
 <input type="text" name="username" maxlength="40"> 
 </td></tr> 
 <tr><td>Password:</td><td> 
 <input type="password" name="pass" maxlength="50"> 
 </td></tr> 
 <tr><td colspan="2" align="right"> 
 <input type="submit" name="submit" value="Login" > 
 </td></tr> 
 </table> 
 </form> 

 
<h3> Are you a new user? </h3><a href=register.php>Click Here to Register</a></div>
 <div id=content>
  <?php
  require_once('about.php');
  ?>
 </div>
 <?php
 do_html_footer();
?>
