<?php

/**
 * puts subscription into folder
 * @Nuru Jingili 
 * @copyright 2010
 */
    require_once ('mysql.php');//call to file with mysql connections code
    require_once('member.php');//call file to diplay user details
    require_once ('rss.php'); //call file which retrieves subscriptions and folders
    require_once('header.php');//call file to with header and footer functions
    
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader:Feed added to folder');
echo "</div>";

echo "<div id=feeds>"; 
require_once('feeds.php');
echo "</div>";
  
        
echo "<div id=content>"; 
$title=$_POST['subscriptions'];
$i=0;
   
while ( $i < count($feeds))
{
  if ($title==$feeds[$i]['title'])
  $link=$feeds[$i]['feed'];
  $i++;
 }
 
 $folder_name=$_POST['folders'];
 $sql="Update subscription SET folderName='$folder_name' WHERE subscription='$link' AND username='$username'";
  
 if (!mysql_query($sql,$con))
 {
  die('Error: ' . mysql_error());
 }
  
  echo('<h4>'.$title."</h4> is added to folder <h4>".$folder_name.'</h4>');
  echo "<p><a href='folder.php'><h3>Back</h3></a>&nbsp;&nbsp;&nbsp;&nbsp;";
  echo "<a href='home.php'><h3>Home</h3></a>";
 
echo "</div>";
?>
<?php
 do_html_footer();
?>