<?php
/**
 * contains links for folder operations
 * @Nuru Jingili 
 * @copyright 2010
 */
    require_once('header.php');
    require_once('member.php');
    echo "<div id=header>"; 
        do_html_header('Adapatable RSS Reader:Manage folder');
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
        <tr><td><a href="new_folder.php">Add New Folder</a></td></tr>
        <tr><td><a href="folder.php">Add Subscription into Folder</a></td></tr>
        <tr><td><a href="delete_folder_form.php">Delete Folder</a></td></tr>
        <tr><td><a href="rename_folder_form.php">Rename Folder</a></td></tr>
    </table>
</div>
<?php
    do_html_footer();
?>