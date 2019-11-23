<?php

/**
 * @author 
 * @copyright 2010
 */
require_once ('mysql.php');//call to file with mysql connections code
require_once('member.php');//call file to diplay user details
require_once('header.php');//call file to with header and footer functions
//insert header
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader:Add folder');
echo "</div>";

  echo "<div id=feeds>"; 
require_once('feeds.php');
echo "</div>";
  

echo "<div id=content>";
// makes sure they filled it in
 	if(!$_POST['folder'] ) {
          
 		echo 'You did not fill in a required field.</br></br>';
                echo '<a href="new_folder.php">Back</a>';
                echo '</div>';
                 do_html_footer();
                 return false;
 	}
  $folder_name=$_POST['folder'];
  $folder_name=addslashes($folder_name);
  
  //check not a repeat folder
$sql=mysql_query("SELECT * FROM folder WHERE username='$username' AND folderName='$folder_name'");
if ($sql &&(mysql_num_rows($sql)>0)){
 echo 'The folder already exists';
 echo "<p><a href='new_folder.php'>Back</a>&nbsp;&nbsp;&nbsp;&nbsp;";
  echo "<a href='Home.php'>Home</a>";
 echo '</div>';
 do_html_footer();
 return false;
}

//insert the new folder
if (mysql_query("INSERT INTO folder (folderName,username) VALUES('$folder_name','$username')"));
  echo("<h3>1 Folder has been added</h3>");
 echo "<p><a href='new_folder.php'>Back</a>&nbsp;&nbsp;&nbsp;&nbsp;  ";
  echo "<a href='Home.php'>Home</a>";


?>
</div>
<?php
 do_html_footer();
?>