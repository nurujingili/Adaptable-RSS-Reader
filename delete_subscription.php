<?php

/**
 * Deletes subscription from the database
 * @Nuru Jingili
 * @copyright 2010
 */

require_once ('mysql.php');
require_once('member.php');
require_once('header.php');
require_once ('rss.php'); 
//insert header
?>
<?php
    echo "<div id=header>"; 
    do_html_header('Adapatable RSS Reader:Delete feed');//display header
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
    //delete subscription form the database
    $sql="DELETE FROM subscription WHERE username='$username' AND subscription='$link'";
    if (!mysql_query($sql,$con))
    {
        echo "Could not delete folder";
        do_html_footer();
        return false;
    }
    else
    {
        echo $title.': ';
        echo(" has been deleted");
        echo "<p><a href='delete_subscription_form.php'>Back</a>";
        echo "<p><a href='home.php'>Home</a>";
     }
    echo "</div>";
    $query=mysql_query("DELETE FROM feeditem WHERE username='$username' AND subscriptionLink='$link'");
    do_html_footer();
?>