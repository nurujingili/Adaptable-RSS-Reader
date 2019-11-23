<?php

/**
 * Marks all items as unread for a given link
 * @author 
 * @copyright 2010
 */
    $link=$_GET['link'];
    $title=$_GET['title'];
    require_once ('member.php');
    require_once ('mysql.php');
     
    $sql= mysql_query("UPDATE feeditem SET readitem ='No' WHERE subscriptionLink='$link' AND username='$username'");
    
    echo "database updated";
    //returns you to the feeditems page
    header("Location: feeditem.php?link=$link&title=$title"); 
?>