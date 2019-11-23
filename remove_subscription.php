
<?php
/**
 * removes subscription from folder
 * @Nuru Jignili 
 * @copyright 2010
 */
 
    require_once ('mysql.php');//call to file with mysql connections code
    require_once('member.php');//call file to diplay user details
    require_once ('rss.php'); //call file which retrieves subscriptions and folders
    require_once('header.php');//call file to with header and footer functions
    
    
  echo "<div id=header>"; 
  do_html_header('Adapatable RSS Reader:Remove feed from folder');
  echo "</div>";
  
  
  echo "<div id=feeds>"; 
  require_once('feeds.php');
  echo "</div>";
    
  
  echo "<div id=content>";
  $title=$_GET['title'];
  $feed=$_GET['link'];
  $folder=$_GET['folders'];
   
  $sql="Update subscription SET folderName=NULL WHERE folderName='$folder' AND subscription='$feed' AND username='$username'";
  if (!mysql_query($sql,$con))
  {
    echo '<p>Could not remove subscription';
  }
  else
    echo '<p>'.$title.' was successsfully removed from folder '.$folder;
  
  echo '<p><a href="home.php">Back</a>';
  
  echo "</div>";
?>
<?php
    do_html_footer();
?>