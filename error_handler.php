
<?php
/**
 * handles errors
 * adapted from the book "PHP and MYSQL WebDevelopment by Welling and Thomson(2003)"
 * @Nuru Jingili
 * @copyright 2010
 */

require_once('header.php');//call file to with header and footer functions


  

// set the user error handler method to be error_handler
set_error_handler('error_handler', E_ALL);
// error handler function
function error_handler($errNo, $errStr, $errFile, $errLine)
{
// clear any output that has already been generated
if(ob_get_length()) ob_clean();
// output the error message
$error_message = 'ERRNO: ' . $errNo . chr(10) .
'TEXT: ' . $errStr . chr(10) .
'LOCATION: ' . $errFile .
', line ' . $errLine;

echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader:Feed added to folder');
echo "</div>";


echo "<div id=content>";
echo '<h3>Oops!! the feed url entered could not be read</h3>';
echo '<p>This may happen if the URL is misspelled or the feed contains an unsupported format';
echo '<p>Check your spelling and try again';
echo '<p><a href="add_subscription.php">Back</a>';
echo "</div>";
 do_html_footer();
// prevent processing any more PHP scripts
exit;
}
?>