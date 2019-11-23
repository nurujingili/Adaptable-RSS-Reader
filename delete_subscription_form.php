<?php
/**
 * Dispalys form for selecting subscription to delete
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
  do_html_header('Adapatable RSS Reader:Delete feed');
  echo "</div>";
  require_once('menu.php');
?>
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
  <?php
    echo "<div id=feeds>"; 
    require_once('feeds.php');
    echo "</div>";
  ?>
  <div id=content>
    <h3>Delete Subscription</h3>
    <form action="delete_subscription.php"  method="post">
    Select Subscription: <select name="subscriptions">
    <?php
      $i=0;
      while ( $i < count($feeds))
      {
        echo '<option>';
        echo $feeds[$i]['title'];
        echo '</option>';
        $i++;
      }
    ?>
</select><br />
<input type="submit"  value="Delete" onClick="return confirmPost()"/>
 </div>
<?php
 do_html_footer();
?>