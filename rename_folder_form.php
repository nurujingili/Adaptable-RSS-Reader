
<?php

/**
 * displays form for renaming folder
 * @Nuru Jingili 
 * @copyright 2010
 */
    require_once ('mysql.php');//call to file with mysql connections code
    require_once('member.php');//call file to diplay user details
    require_once ('rss.php'); //call file which retrieves subscriptions and folders
    require_once('header.php');//call file to with header and footer functions
    
    echo "<div id=header>"; 
    do_html_header('Adapatable RSS Reader: Rename folder');
    echo "</div>";
?>
<?php
    echo "<div id=feeds>"; 
    require_once('feeds.php');
    echo "</div>";
?>

<div id=content>
    <h3>Rename Folder</h3></br>
    <form action="rename_folder.php" method="post">

    Select folder to rename: <select name="folders">
    <?php
    $i=0;
    while ( $i < count($folders))
    {
        echo '<option>';
        echo $folders[$i];
        echo '</option>';
        $i++;
    }
    ?>
    </select><br />
    <p>New name:<input type="text" name="rename" id="rename" title="enter a single word"/>
    <p><input type="submit" name="folder" value="Submit"/>
    </form>
</div>
<?php
do_html_footer();
?>