<?php
/**
 * displays a form for adding a new folder
 * @Nuru Jingili
 * @copyright 2010
 */
require_once('header.php');
require_once ('mysql.php');
require_once ('rss.php'); 
?>
<?php
 echo "<div id=header>"; 
  do_html_header('Adapatable RSS Reader: New folder');
 echo "</div>";

?>
<?php
  echo "<div id=feeds>"; 
  require_once('feeds.php');
  echo "</div>";
?>
<div id=content>
  <h3>New Folder</h3></br>
  <form action="add_folder.php" method="post">
    Add New Folder:<input type="text" name="folder" id="folder" title="Enter a single word"/>
    <input type="submit"/>
  
  </form>
</div>
<?php
 do_html_footer();
?>