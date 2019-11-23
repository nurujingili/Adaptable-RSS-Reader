<?php
/**
 *retrives subscription and folder fields from the database and stores them in array variables
 * @Nuru Jingili
 * @copyright 2010
 */
require_once ('mysql.php');//call to file with mysql connections code
require_once('member.php');//call file to diplay user details

//retrieves subscription fields and stores them in array
 $result = mysql_query("SELECT * FROM subscription WHERE username='$username'");
    $i=0;
    $feeds=array();
    while($row = mysql_fetch_array($result))
    {+
        $channel_link=stripslashes($row['subscription']);
        $channel_title=stripcslashes($row['title']);
        $channel_desc=stripslashes( $row['description']);
        $channel_folder=stripslashes( $row['folderName']);
    $feeds[$i]=array('title' => $channel_title,'feed' => $channel_link,'folder' => $channel_folder);
    $i++;
    }
    
    //retrieves folder fields and stores them in array 
   $query = mysql_query("SELECT * FROM folder WHERE username='$username'"); 
    $i=0;
    $folders=array();
    while($row = mysql_fetch_array($query))
    {
        $folder_name=stripcslashes($row['folderName']);
        $folders[$i]=mysql_result($query,$i);
        $i++;
        }
?>

