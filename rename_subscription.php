<?php
 
 require_once ('mysql.php');//call to file with mysql connections code
    require_once('member.php');//call file to diplay user details
    require_once ('rss.php'); //call file which retrieves subscriptions and folders
    require_once('header.php');//call file to with header and footer functions
    
    
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader: Rename feed');
echo "</div>";


  echo "<div id=feeds>"; 
require_once('feeds.php');
echo "</div>";
  
echo "<div id=content>";
if(!$_POST['rename'] ) {
          
 		echo 'You did not fill in a required field.</br></br>';
                echo '<a href="rename_subscription_form.php">Back</a>';
                echo '</div>';
                 do_html_footer();
                 return false;
 	}
 $rename=$_POST['rename'];
 $title=$_POST['subscriptions'];

 $sql="Update subscription SET title='$rename' WHERE title='$title' AND username='$username'";
if (!mysql_query($sql,$con))
  {
  echo '<p>Could not rename the subscription';
  }
else
echo '<p>Rename was successsfully';
?>

<p><a href="rename_subscription_form.php">Back</a>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="home.php">Home</a>

</div>
<?php
    do_html_footer();
?>