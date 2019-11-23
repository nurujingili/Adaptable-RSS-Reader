 <?php
 /**
 * This code was adapted from http://php.about.com/od/finishedphp1/ss/php_login_code_7.htm
 * @copyright 2010
 */
 $past = time() - 100; 
 //this makes the time in the past to destroy the cookie 
 setcookie(ID_my_site, gone, $past); 
 setcookie(Key_my_site, gone, $past); 
 header("Location: index.php"); 
 ?> 