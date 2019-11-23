<?php
/**
 *Adds subscriptions into the database
 *fetches the link,title and description of the entered subscription
 *fetch feeds for each feeditem stores title,link and description
 * @Nuru Jingili
 * @copyright 2010
 */


    require_once('header.php');//call file to with header and footer functions
    require_once('member.php');//call file to diplay user details
    require_once ('mysql.php');//call to file with mysql connections code
    
    require_once ('error_handler.php');//handles all errors 
    
    echo "<div id=header>"; 
        do_html_header('Adapatable RSS Reader');//display header
    echo "</div>";
    
    echo "<div id=feeds>"; 
        require_once('feeds.php');
    echo "</div>";
      
            
    echo "<div id=content>"; 
?>

<?PHP
// makes sure they filled it in
    if(!$_POST['add'] )
    {
              
        echo 'You did not fill in a required field.</br></br>';
        echo '<a href="home.php">Back</a>';
        echo '</div>';
        do_html_footer();
        return false;
    }
    $add=$_POST['add'];
    
    $xml=$add;
    
    $xmlDoc = new DOMDocument();
    if(!$xmlDoc->load($xml))
    {
        echo 'error in document';
        exit;
    }
    
    //get elements from "<channel>"
    $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
    $channel_title = $channel->getElementsByTagName('title')
    ->item(0)->childNodes->item(0)->nodeValue;
    $channel_link = $channel->getElementsByTagName('link')
    ->item(0)->childNodes->item(0)->nodeValue;
    $channel_desc = $channel->getElementsByTagName('description')
    ->item(0)->childNodes->item(0)->nodeValue;
    $channel_pubDate=$channel->getElementsByTagName('pubDate')
      ->item(0)->childNodes->item(0)->nodeValue;
    //
    $channel_link=addslashes($channel_link);
    $channel_title=addslashes($channel_title);
    $channel_desc=addslashes($channel_desc);
    $channel_pubDate=addslashes($channel_pubDate);
    $subscription=addslashes($xml);
    //store elements from "<channel>"
    
    
    //check not a repeat subscription
    $sql=mysql_query("SELECT * FROM subscription WHERE username='$username' AND subscription='$subscription'");
    if ($sql &&(mysql_num_rows($sql)>0))
    {
        echo "<p>";
        echo 'Subscription Already exists';
        echo "<p><a href='add_subscription.php'>Back</a>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='Home.php'>Home</a>";
        echo '</div>';
        do_html_footer();
        return false;
    }
    else
    {
        //store elements from "<channel>"
        $query="INSERT INTO subscription (link,title,description,username,subscription,pubDate)
        VALUES
        ('$channel_link','$channel_title','$channel_desc','$username','$subscription','$channel_pubDate')";
        
            if (!mysql_query($query,$con))
            {
                die('Error: ' . mysql_error());
            }
      
    }
    
    
    //get and store "<item>" elements
    $x=$xmlDoc->getElementsByTagName('item');
    for ($i=0; $i< $x->length; $i++)
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
        $item_pubDate=addslashes($item_pubDate);
        
        //store the new items elements
        $sql="INSERT INTO feeditem (link,title,description,subscriptionLink,username,pubDate)
        VALUES
        ('$item_link','$item_title','$item_desc','$subscription','$username','$item_pubDate')";
        
        if (!mysql_query($sql,$con))
        {
          die('Error: ' . mysql_error());
        }
    
    }
      
    header("Location: feeditem.php?link=$subscription&title=$channel_title&folder=null"); //redirect back to homepage
     
?>
</body>
</html>