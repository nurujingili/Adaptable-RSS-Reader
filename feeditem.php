
<?php
/**
 *Adds retrieves feeds from the database and display them the user.
 *displays users related feeds
 *
 * @Nuru Jingili
 * @copyright 2010
 */
require_once('header.php');//call file with header and footer functions
require_once('member.php');//call file to diplay user details
require_once ('mysql.php');//call to file with mysql connections code

require_once ('pagination.php');//call to file containing functions for putting documents into pages,showing page numbers and navigation between pages
require_once ('similar_feed_items.php');//call to file with functions for displaying related feeds
require_once('stopword.php'); //contails list of stopwords
require_once ('cosine_similarity_functions.php');//has functions for calculating cosine similarity and sorting
?>

<?php
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader:View feed items');
echo "</div>";
echo '<div>';
echo "<div id=feeds>"; 
require_once('feeds.php');
echo "</div>";
// The following block of javascript code was adapted from http://www.namepros.com/code/67426-javascript-expand-collapse.html
//it expands and collapses blocks of code
?>

<script langauge="JavaScript" type="text/javascript">
function doMenu(item) {
 obj=document.getElementById(item);
 col=document.getElementById("x" + item);
 if (obj.style.display=="none") {
  obj.style.display="block";
  col.innerHTML="[-]";
 }
 else {
  obj.style.display="none";
  col.innerHTML="[+]";
 }
}
</script> 
</head>
<body >
     
     <div id=content >
<?php

$link=$_GET['link'];


$title=$_GET['title'];


echo "<p><a href='home.php'><h3>Back</h3></a>";
echo"<h2>$title</h2>";
 echo "<a href='mark_as_read.php?link=$link&title=$title'>Mark All As Read</a>&nbsp;&nbsp;&nbsp;";
   echo "<a href='mark_as_unread.php?link=$link&title=$title'>Mark all as unread</a></br></br>"; 
 //$max = mysql_result(mysql_query("SELECT * FROM feeditem WHERE subscriptionLink='$link' AND readitem='no' AND username='$username' ORDER BY feedItemID DESC"),0);                                                    
$result= mysql_query("SELECT * FROM feeditem WHERE subscriptionLink='$link' AND readitem='no' AND username='$username'");
 
 $max= mysql_num_rows($result);
 //if no unread items were found
 if ($max==0){
 
 echo "<p><h3>has (".$max.") unread items</h3>";
 echo "<p><a href='home.php'>Go back to homepage</a>";
// do_html_footer();
 return false;
 }
 else{
    
 //for displaying results into pages with ten results per page            
$pager = new pager( 
    $max ,                     /*see above*/
    10 ,                         /*how many records to display at one time*/
    @$_GET['_p']  /*this is the current page no carried via _GET*/
    ) ;
  echo $pager->get_title('Page {CURRENT} of {MAX}&nbsp;&nbsp;&nbsp;Displaying results {FROM} to {TO} of {TOTAL}'). ' <br />';
     //find out the size of our recordset , only fetch a count, in this query nothing else


 $result = mysql_query("SELECT * FROM feeditem WHERE subscriptionLink='$link' AND readitem='no' AND username='$username' ORDER BY feedItemID DESC LIMIT ".$pager->get_limit());                
 
     $query= mysql_query("SELECT * FROM feeditem WHERE username='$username' AND readitem='no'");
    $alldoc= mysql_num_rows($query);
 //echo '<h3>Has('.$length.') unread items</h3>';
    $i=0;
    while($row = mysql_fetch_array($result))
    {
         $item_link=stripslashes($row['link']);
         $item_title=stripslashes($row['title']);
         $item_desc=stripslashes( $row['description']);
         $item_pubDate=stripslashes($row['pubDate']);
   
     
          $item=$item_link;
          ?>
        <div  onclick="parent.location='read_item.php?item=<?php echo "$item"; ?>&link=<?php echo "$link"; ?>&title=<?php echo "$title"; ?>'">
        <?php
        
            echo("<h2><a href='".$item_link."'target='_blank'>".$item_title."</a></h2>");
             echo "</div>";
            echo "".$item_pubDate;
            echo "<p>".$item_desc;
            //echo "Related feeds:";
            echo "</br></br>";
            
           
            echo "<a href='read_item.php?link=$link&title=$title&item=$item'>Mark item as read</a></br></br>";
            //similar_feeds($item_title,$alldoc);
            ?>
            <a href="JavaScript:doMenu('<?php echo $i; ?>');" id=x<?php echo $i; ?>>[+]</a> related feeds
            <?php count_related_feeds($item_title,$alldoc,$username,$stopword); ?>
            <div id=<?php echo $i; ?> style="display:none" style="margin-left:2em">
            <a href=#><?php display($item_title,$alldoc,$username,$stopword); ?></a>
            
            </div>
             
            <?php
           $i++;
    }

/*show navigation links between pages*/
echo $pager->get_prev('<a href="{LINK_HREF}"><< Prev</a>');
echo '&nbsp;&nbsp;&nbsp; ';
echo $pager->get_range('<a href="{LINK_HREF}">{LINK_LINK}</a>',' &raquo ')." &nbsp;&nbsp;&nbsp; ";
echo $pager->get_next('<a href="{LINK_HREF}">Next >></a>');
echo "<p><a href='home.php'><h3>Back</h3></a>";
 }
 
?>
     </div>
     <?php
    do_html_footer();
?>
