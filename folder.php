<?php
/**
 * displays a form for adding subscription into folder
 *
 * @Nuru Jingili
 * @copyright 2010
 */

   require_once('header.php');//call file to with header and footer functions
   require_once ('mysql.php');//call to file with mysql connections code
   require_once ('rss.php'); //call file which retrieves subscriptions and folders
?>
<?php
   echo "<div id=header>"; 
   do_html_header('Adapatable RSS Reader');
   echo "</div>";

?>
<?php
   echo "<div id=feeds>"; 
   require_once('feeds.php');
   echo "</div>";
?>
   <div id=content>
      
      <h3>Add subscription into folder</h3></br>
      <form action="folder_subscription.php" method="post">
         Select Subscription: <select name="subscriptions">
          <?php
          $i=0;
         
          while ( $i < count($feeds))
          {
            echo '<option>';
            echo $feeds[$i]['title'];
            echo '</option>';
            $i++;
          }
          ?>
         </select><br />
         Select Existing Folder: <select name="folders">
          <?php
          $i=0;
         
          while ( $i < count($folders))
          {
            echo '<option>';
            echo $folders[$i];
            echo '</option>';
            $i++;
          }
          ?>
      </select><br />
      
      <input type="submit" name="folder" value="Submit"/>
      
      </form>
   </div>
<?php
 do_html_footer();
?>