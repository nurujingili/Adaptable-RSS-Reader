<?php
/**
 * contains links for subscription operations
 * @Nuru JIngili
 * @copyright 2010
 */
    require_once('header.php');
    require_once('member.php');
    echo "<div id=header>"; 
    do_html_header('Adapatable RSS Reader:Manage subscriptions');
    echo "</div>";
    require_once('menu.php');
?>
<?php
    echo "<div id=feeds>"; 
    require_once('feeds.php');
    echo "</div>";
?>
<div id=content>
  <table>
    
    <tr><td><a href="folder.php">Add subscription into folder</a></td></tr>
    <tr><td><a href="delete_subscription_form.php?link=$link">Delete subscription</a></td></tr>
    <tr><td><a href="rename_subscription_form.php">Rename subscription</a></td></tr>
  </table>
</div>
<?php
do_html_footer();
?>