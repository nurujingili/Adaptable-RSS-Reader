
<?php
/**
 * Displays form for adding new subscription
 * @Nuru Jingili
 * @copyright 2010
 */

require_once('member.php');//call file to diplay user details
require_once ('rss.php'); //call file which retrieves subscriptions and folders
require_once('header.php');//call file to with header and footer functions

//display header
echo "<div id=header>"; 
    do_html_header('Adaptable RSS Reader:Home');
echo "</div>";
echo "<div id=feeds>"; 
    require_once('feeds.php');
echo "</div>";
?>

<div id=content>
    <table>
        <h2><form method="post" action="subscription.php">
        
            <tr >
                <td><h3>Enter your RSS feed URL (e.g. http://www.skysports.com/rss/0,20514,12040,00.xml )</h3></td><td> <input type="text" name="add"/></td>
                <td><input type="submit"  value="Add subscription"/></td>
            </form>
            </tr>
            <form  method="post" action="search.php">
    </table>

</div>
     <?php
    do_html_footer();
?>