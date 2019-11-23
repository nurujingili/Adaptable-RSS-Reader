<?php

/**
 * Marks single item as read. 
 * @Nuru Jingili 
 * @copyright 2010
 */

$item=$_GET['item'];
$link=$_GET['link'];
$title=$_GET['title'];

$item=addslashes($item);
require_once ('member.php');
require_once ('mysql.php');
 echo "</br>";
$sql= "UPDATE feeditem SET readitem ='yes' WHERE link='$item' AND username='$username'";
if (!mysql_query($sql,$con))
  {
    echo 'not succsssfull';
  }
  else
header("Location: feeditem.php?link=$link&title=$title"); 

?>