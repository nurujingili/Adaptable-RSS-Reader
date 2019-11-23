<?php

/**
 * Deletes folder from the database
 * @Nuru Jingili
 * @copyright 2010
 */

require_once ('mysql.php');//call to file with mysql connections code
require_once('member.php');//call file to diplay user details
require_once('header.php');//call file to with header and footer functions
require_once ('rss.php'); //call file which retrieves subscriptions and folders
//insert header
?>
<?php
    echo "<div id=header>"; 
    do_html_header('Adapatable RSS Reader:Delete folder');
    echo "</div>";
    require_once('menu.php');
?></div>
<?php
    echo "<div id=feeds>"; 
    require_once('feeds.php');
    echo "</div>";
?>

<div id=content>
    
<?php



  $folder_name=$_POST['folder'];
  $folder_name=addslashes($folder_name);
  
  //delete folder from the database
  $sql="DELETE FROM folder WHERE username='$username' AND folderName='$folder_name'";
  if (!mysql_query($sql,$con))
  {
    echo "Could not delete folder";
    echo '</div>';
    do_html_footer();
    return false;
  }
  else
  {
    echo $folder_name;
    echo(" has been deleted");
  }
  //update subscription table
  $sql2="Update subscription SET folderName=Null WHERE folderName='$folder_name' AND username='$username'";
  
  if (!mysql_query($sql2,$con))
  {
    echo "Could not update subscription";
  }
  $sql3="Update feeditem SET folderName=Null WHERE folderName='$folder_name' AND username='$username'";
  
  if (!mysql_query($sql3,$con))
  {
    echo "Could not update subscription";
  }
  ?>
  <p><a href="delete_folder_form.php">Back</a>
  &nbsp;&nbsp;&nbsp;&nbsp;<a href="home.php">Home</a>
  </div>
  
    <?php
   do_html_footer();
?>