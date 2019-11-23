 <?php
 /**
  *
 * this code was adapted from http://php.about.com/od/finishedphp1/ss/php_login_code_6.htm
 * @copyright 2010
 */
 // Connects to your Database 
 require_once ('mysql.php'); 
 
 //checks cookies to make sure they are logged in 
 if(isset($_COOKIE['ID_my_site'])) 
 { 
 	$username = $_COOKIE['ID_my_site']; 
 	$pass = $_COOKIE['Key_my_site']; 
 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 
 	while($info = mysql_fetch_array( $check )) 	 
 		{ 
 
 //if the cookie has the wrong password, they are taken to the login page 
 		if ($pass != $info['password']) 
 			{ 			header("Location: index.php"); 
 			} 
 
 //otherwise they are shown the admin area	 
 	else 
 			{ echo "<div align='right'>";
 			 echo "Hi"." ".$username ."<br/>";
 
             echo "<a href=logout.php>Logout</a>";
	     echo "</div>";
 			} 
 		} 
 		} 
 else 
 
 //if the cookie does not exist, they are taken to the login screen 
 {			 
 header("Location: index.php"); 
 } 
 ?> 