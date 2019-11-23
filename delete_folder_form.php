<?php
/**
 * dispalys form for selecting the folder to delete and a confirmation message.
 * @Nuru Jingili
 * @copyright 2010
 */

require_once('member.php');//call file to diplay user details
require_once('header.php');//call file to with header and footer functions
require_once ('rss.php'); //call file which retrieves subscriptions and folders
//insert header
?>
<?php
   echo "<div id=header>"; 
   do_html_header('Adapatable RSS Reader:Delete folder');
   echo "</div>";
?>
<?php
   echo "<div id=feeds>"; 
   require_once('feeds.php');
   echo "</div>";
?>
<div id=content>
   <script LANGUAGE="JavaScript">
      <!--
      function confirmPost()
      {
      var agree=confirm("Are you sure you want to delete?");
      if (agree)
      return true ;
      else
      return false ;
      }
      // -->
   </script>
   </head>
   <body>
      <h3>Delete Folder</h3></br>
      <form action="delete_folder.php"  method="post">
         </select><br />
            Select Folder: <select name="folder">
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
      <input type="submit"  value="Delete" onClick="return confirmPost()"/>
   </form>
</div>
<?php
 do_html_footer();
?>