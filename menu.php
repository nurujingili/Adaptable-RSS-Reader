<?php

/**
 *Displays  menu items
 * @Nuru jingili
 * @copyright 2010
 */
?>

<html>
<head>
<style>
table{font-size:100%}
a{font:bold}

a:hover{color:lightblue}
td.menu{background:lightblue}
table.menu
{
    
font-size:small;
position:absolute;
visibility:hidden;
}
</style>

<script type="text/javascript">
function showmenu(elmnt)
{
document.getElementById(elmnt).style.visibility="visible";
}
function hidemenu(elmnt)
{
document.getElementById(elmnt).style.visibility="hidden";
}
</script>
</head>

<body>
<div align="right" >
<table  >
 <tr >
   <td onmouseover="showmenu('home')" onmouseout="hidemenu('home')">
   <a href="home.php">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<br />
   <table class="menu" id="home" width="120">
   
   <tr><td class="menu"><a href="config.php">Refresh Feeds</a></td></tr>

   </table>
  </td>
  <td onmouseover="showmenu('folders')" onmouseout="hidemenu('folders')">
   <a href="manage_folder.php">Manage Folders</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<br />
   <table class="menu" id="folders" width="120" >
   <tr><td class="menu"><a href="new_folder.php">New folder</a></td></tr>
   <tr><td class="menu"><a href="delete_folder_form.php">Delete </a></td></tr>
   <tr><td class="menu"><a href="rename_folder_form.php">Rename </a></td></tr>
   <tr><td class="menu"><a href="folder.php">Add subscription </a></td></tr>

   </table>
  </td>
<td onmouseover="showmenu('subscriptions')" onmouseout="hidemenu('subscriptions')">
   <a href="manage_subscription.php">Manage Subscriptions</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<br />
   <table class="menu" id="subscriptions" width="120">
    <tr><td class="menu" ><a href="add_subscription.php">put into folder </a></td></tr>
   <tr><td class="menu" ><a href="delete_subscription_form.php">Delete </a></td></tr>
   <tr><td class="menu"><a href="rename_subscription_form.php">Rename </a></td></tr>
  </table>
  </td>
  <td onmouseover="showmenu('Help')" onmouseout="hidemenu('Help')">
   <a href="FAQS.php">Help</a><br />
   <table class="menu" id="Help" width="120">
    <tr><td class="menu" ><a href="FAQS.php">Help </a></td></tr>



   </table>
  </td>
 </tr>
</table>
</div>
</body>
</html>



