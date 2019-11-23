
<?php
/**
 *Homepage of the application
 *dispalays subscriptions and folders
 *can add subscriptions from this page
 *can search for feed items from this page
 * @Nuru Jingili
 * @copyright 2010
 */

require_once('member.php');//call file to diplay user details
require_once ('rss.php'); //call file which retrieves subscriptions and folders
require_once('header.php');//call file to with header and footer functions

?>
<?php
    //display header
    echo "<div id=header>"; 
    do_html_header('Adaptable RSS Reader:Home');
    echo "</div>";
    echo "<div id=feeds>"; 
    require_once('feeds.php');
    echo "</div>";
?>
<div id=content>
<?php
  require_once('about.php');
?>
</div>
<?php
 do_html_footer();//dispaly footer
?>