<?php
   /**
    *contains functions that finds related feeds, and displays them
    * @Nuru Jingili
    * @copyright 2010
    */
   require_once('member.php');
   require_once ('cosine_similarity_functions.php');
   require_once ('mysql.php');//call to file with mysql connections code
   require_once('stopword.php');    
   
    
  //finds the related feeds and store then in an array  
 function similar_feeds($item_title,$alldoc,$username,$stopword){
    
    $key=keywords($item_title);
    $stopwords=keywords($stopword);
    $keyword=remove_stopwords($key,$stopwords);
    $word=implode(' ',$keyword);
    
    $n=0;
    $whereClause='';
    while($n<count($keyword))
    {
        if ($n!=count($keyword)-1)//checks it is not the last term
        {
           $whereClause.=" title LIKE '$keyword[$n]%' OR "; //do this for all terms except the lst one.
        }
        else
        {
            $whereClause.=" title LIKE '$keyword[$n]%'"; // do this for last term
        }
        $n++;
        
    }
   
   $sql=mysql_query("SELECT * FROM feeditem WHERE username='$username' AND readitem='no' AND $whereClause");
    
   if ($sql &&(mysql_num_rows($sql)>0))
   {
      $length= mysql_num_rows($sql);
      $max=maxfreq($word);
      $terms=count_words($word);
      $wq=calculate_wq($max,$terms);
      //echo "<h2>related feeds</h2>";
   //print_r( $keyword);
   //print_r( $stopwords);
   $i=0;
   $related=array();
        while($row = mysql_fetch_array($sql))
        {
             $link=stripslashes($row['link']);
             $title=stripslashes($row['title']);
             $desc=stripslashes( $row['description']);
             $feed_link=stripslashes($row['subscriptionLink']);
             $doc=count_words($title);
             $docwords=keywords($title);
             $max_frequency=maxfreq($title);
             
             $sim=calculate_similarity($keyword,$alldoc,$doc,$docwords,$max_frequency,$length,$wq);
             if ($sim>=0.5 && $title!=$item_title)
             {
               if($i<5)
               $related[$i]=array('title' => $title,'link' => $link,'feed' =>$feed_link,'similarity'=>$sim);
               $i++;
             }
             
        }
        return $related;
   }

 }
 //counts the number of related feeds
function count_related_feeds($item_title,$alldoc,$username,$stopword)
{
   $related=similar_feeds($item_title,$alldoc,$username,$stopword);
   echo "(".count($related).")</br>";
}

//displays related feeds
function display($item_title,$alldoc,$username,$stopword)
{
   $related=similar_feeds($item_title,$alldoc,$username,$stopword);
   $related= msort($related, "similarity", false);
   $i=0;
        
   while($i<count($related))
   {
      $feed=$related[$i]['feed'];
      $from=mysql_query("SELECT * FROM subscription WHERE  subscription='$feed' AND username='$username'");
      while($row = mysql_fetch_array($from))
         {
            $subscription=stripslashes($row['title']);
         }
               
      echo("<p ><a href='".$related[$i]['link']."'target='_blank'>".$related[$i]['title']."</a>");
      if(mysql_num_rows($from)>0)
      echo("<h5>  From ".$subscription."</h5>");
              
      $i++;
   }
         
}
 
?>