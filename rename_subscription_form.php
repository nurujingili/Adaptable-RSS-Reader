
<?php

/**
 *renames subscription
 * @Nuru Jingili
 * @copyright 2010
 */
    require_once ('mysql.php');//call to file with mysql connections code
    require_once('member.php');//call file to diplay user details
    require_once ('rss.php'); //call file which retrieves subscriptions and folders
    require_once('header.php');//call file to with header and footer functions
    
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader: Rename feed');
echo "</div>";
?>

<?php
  echo "<div id=feeds>"; 
  require_once('feeds.php');
  echo "</div>";
?>
<div id=content>
  <h3>Rename Subscription</h3></br>
   
  <form action="rename_subscription.php" method="post">
  
    Select subscription to rename: <select name="subscriptions">
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
       <p>New name:<input type="text" name="rename" id="rename" />
       <p><input type="submit" name="subscription" value="Submit"/>
  </form>
</div>
<?php
    do_html_footer();
?>