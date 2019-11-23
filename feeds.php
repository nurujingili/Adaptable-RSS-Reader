<php?
      /*
      *Adds subscriptions into the database
      *Displays left side pannel of the apllication
      *displays folders, subscription, and link fo adding subscriptiona and the search feeds text box
      *
      * @Nuru Jingili
      * @copyright 2010
      */
      ?>
<html><head>
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
<script type="text/javascript">
<!--
function refresh_feeds(){
    window.location = "config.php"
}
//-->
</script>
</head>
<body onLoad="setTimeout('refresh_feeds()', 600000)">
 <form  method="post" action="search.php">
<div>
<table>
    <tr><td>
    Enter search keyword<input type="text" name="search"/></td>
    <td><input type="submit" value="Search feeds"/></td>
    </form></h2></tr>
    
<tr><td>
<a href='add_subscription.php'><img src='add.gif' alt='RSS logo' border=0 align=left valign=bottom height = 25 width = 27><h3>Add a subscription</h3></a>
</td></tr>
</table> 
</div>
<?php
  require_once('member.php');//call file to diplay user details
  require_once ('rss.php');
  
// display subscriptions with no folders.
   
        $k=0;
         while ( $k < count($feeds))
        {
         if($feeds[$k]['folder']==null){
            $link=$feeds[$k]['feed'];
            $title=$feeds[$k]['title'];
           echo "<tr>";
           echo "<td>";
            echo "<h3>";
            echo("<img src='rss_logo.gif' alt='RSS logo' border=0
       align=left valign=bottom height = 25 width = 27><a href='feeditem.php?link=$link&title=$title&folder=null'>".$feeds[$k]['title']."</a>"); 
            echo "</h3>";
            echo "</td>";
             echo "</tr>";
              echo "<tr>";
            echo "<td>";
            // echo "<a href='mark_as_read.php?link=$link'>Mark all as read</a></br>";
            //echo "<a href='mark_as_unread.php?link=$link'>Mark all as unread</a></br>";
            echo "</td>";
            echo "</tr>";
            
                                                                                                                                                                                                                                                                                                         
        }
        $k++;
}
         echo "</table>";
        ?>
<?php
// Display folders and their subscriptions

    $i=0;
   
  while ( $i < count($folders))
        { 
      ?>
      
        <p><h2><a href="JavaScript:doMenu('<?php echo $folders[$i];?>');" id=x<?php echo $folders[$i];?>>[+]</a><img src='openfolder.gif' alt='RSS logo' border=0align=left valign=bottom height = 25 width = 27><?php echo $folders[$i];?></h2> 
        <?php 
    
          $k=0;
       echo " <div id=$folders[$i]  style='display:none'>";
         while ( $k < count($feeds))
        {
           if($folders[$i]==$feeds[$k]['folder']){
  
            $link=$feeds[$k]['feed'];
            $title=$feeds[$k]['title'];
          
            echo "<h2 style='margin-left:2em'>";
            echo "      ";
            echo("<img src='rss_logo.gif' alt='RSS logo' border=0
       align=left valign=bottom height = 25 width = 27><a href='feeditem.php?link=$link&title=$title&folder=$folders[$i]' >".$feeds[$k]['title']."</a>"); 
            echo "</h2>";
           
             //echo "<p style='margin-left:3em'> <a href='mark_as_read.php?link=$link'>Mark all as read";
             //echo "<p style='margin-left:3em'><a href='mark_as_unread.php?link=$link'>Mark all as unread</a>";
             echo "<p style='margin-left:3em'><a href='remove_subscription.php?link=$link&folders=$folders[$i]&title=$title'>Remove subscription from folder</a>";
           }
           
            $k++;
                                                                                                                                                                                                                                                                                                              
        }
        echo "</div>";
          $i++; 
     }
     
     
         
?>
</body></html>  