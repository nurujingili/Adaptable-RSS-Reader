<?php
/**
 * Displays search results
 * @Nuru Jingili
 * @copyright 2010
 */
require_once('header.php');
require_once('member.php');
require_once ('pagination.php');
require_once ('cosine_similarity_functions.php');
require_once('stopword.php');
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader:Search results');
echo "</div>";

?>
<?php
  echo "<div id=feeds>"; 
require_once('feeds.php');
echo "</div>";
  ?>
<div id=content>
<?php
require_once ('mysql.php');



// makes sure they filled it in
 	if(!$_POST['search'])
        {
 		die('You did not fill in a required field.');
 	}
     
     $search=$_POST['search'];
     $key=keywords($search);
     $stopwords=keywords($stopword);
     $keyword=remove_stopwords($key,$stopwords);
     if (count($keyword)==0)
     {
          echo 'you have entered a very general term,please enter a more specific term';
          echo "<p><a href='home.php'>Go back to homepage</a>";
          echo '</div>';
          do_html_footer();
         
          return false;
     }
     $word=implode(' ',$keyword);
     $max=maxfreq($word);
     $terms=count_words($word);
     $wq=calculate_wq($max,$terms);
     
     $n=0;
     $whereClause=" description LIKE '%$search%' OR ";
     while($n<count($keyword))
     {
        if ($n!=count($keyword)-1)
        {
           $whereClause.=" description LIKE '$keyword[$n]%' OR title LIKE '$keyword[$n]%' OR"; 
        }
        else
        {
            $whereClause.=" description LIKE '$keyword[$n]%' OR title LIKE '$keyword[$n]%'";
        }
        $n++;
        
    }
     
     //fetch the searched items
     $result= mysql_query("SELECT * FROM feeditem WHERE $whereClause AND username='$username'");
     $length= mysql_num_rows($result);
     
     if ($length==0)
     {
     
         echo 'There are ('.$length.') results';
          echo "<p><a href='home.php'>Go back to homepage</a>";
          echo '</div>';
          do_html_footer();
         
          return false;
     }
     else
     {
          //for displaying results into pages with ten results per page
          
          $sql= mysql_query("SELECT * FROM feeditem WHERE username='$username'");
          $alldoc= mysql_num_rows($sql);
          $key=keywords($keyword);
          $i=0;
          while($row = mysql_fetch_array($result))
          {
               $item_desc=stripslashes( $row['description']);
               $doc=count_words($item_desc);
               $docwords=keywords($item_desc);
               $max=maxfreq($item_desc);
               $sim=calculate_similarity($key,$alldoc,$doc,$docwords,$max,$length,$wq);
               $item_link=stripslashes($row['link']);
               $item_title=stripcslashes($row['title']);
               $channel_link=stripslashes( $row['subscriptionLink']);
                
               
               $feedItems[$i]=array('title' => $item_title,'feed' => $item_link,'description' =>$item_desc,'similarity'=>$sim);
               $i++;
                
          }
     
     
          $feedItems= msort($feedItems, "similarity", false);
           
          $x=0;
          echo "<h2>Search Results</h2>";
          echo 'There are ('.$length.') results';
          while ( $x < count($feedItems))
          {    echo '<div id=feeditems>';
               echo("<p ><a href='".$feedItems[$x]['feed']."'target='_blank'>".$feedItems[$x]['title']."</a>");
               echo ("<p>".$feedItems[$x]['description']);
               
               echo '</div>';
               $x++;
          }



          echo "<p><a href='home.php'><h3>Back</h3></a>";
 
     }
?>
</div>
<?php
 do_html_footer();
?>