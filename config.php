<?php

/**
 *file for updating feeds
 * @Nuru Jingili
 * @copyright 2010
 */


require_once('header.php');//call file to with header and footer functions
require_once('member.php');//call file to diplay user details
require_once ('mysql.php');//call to file with mysql connections code
require_once ('rss.php');//call file which retrieves subscriptions and folders
?>

<?php
    echo "<div id=header>"; 
    do_html_header('Adapatable RSS Reader'); //diplays header
    echo "</div>";

?>
<?PHP

 //fetch all subscriptions and update them
$k=0;
while ( $k < count($feeds)) {      
$link=$feeds[$k]['feed'];
$xml=$link;
$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get and store "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<$x->length; $i++)
  {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_pubDate=$x->item($i)->getElementsByTagName('pubDate')
  ->item(0)->childNodes->item(0)->nodeValue;


    $item_desc=addslashes($item_desc);
    $item_title=addslashes($item_title);
    $item_link=addslashes($item_link);
    
    //check not a repeat feeditem
    $query=mysql_query("SELECT * FROM feeditem WHERE subscriptionLink='$xml' AND link='$item_link' AND username='$username'");
    
    if ($query && (mysql_num_rows($query)>0))
    {
        echo " ";
    }
    else
    {
        //insert the new feeditem
        $sql="INSERT INTO feeditem (link,title,description,subscriptionLink,username)
        VALUES
        ('$item_link','$item_title','$item_desc','$xml','$username')";
        
        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }
      
    }
  }
  $k++;
   }
   echo "</br>";
 header("Location: home.php");//redirects to home page    
?>
<?php
 do_html_footer();// displays footer
?>