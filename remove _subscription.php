
<?php
 /**
 * removes subscription from folder
 * @Nuru jingili
 * @copyright 2010
 */
 require_once ('mysql.php');//call to file with mysql connections code
    require_once('member.php');//call file to diplay user details
    require_once ('rss.php'); //call file which retrieves subscriptions and folders
    require_once('header.php');//call file to with header and footer functions
    
    
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader');
echo "</div>";

  echo "<div id=feeds>"; 
require_once('feeds.php');
echo "</div>";
  
echo "<div id=content>";
 $feed=$_GET['link'];
 $folder=$_GET['folders'];
 
 $sql="Update subscription SET folderName='' WHERE folderName='$folder' AND subscription='$feed' AND username='$username'";
if (!mysql_query($sql,$con))
  {
  echo '<p>Could not remove subscription';
  }
else
echo '<p>Rename was successsfully';



?>
</div>
<?php
    do_html_footer();
?>