

<?php

/**
 *have functions that facilitate calculation of cosine similarity 
 * has function for sorting 
 *
 * @Nuru Jingili
 * @copyright 2010
 */


function count_words($word){
    //the code is from: http://www.thewebsqueeze.com/forum/MySQL-f43/Getting-A-Count-For-Words-t3070.html
    $string = "$word";
    
    $string = preg_replace("/<([^>]+)>/i", '', $string); //Delete all tags in the string
    $results = array(); //Initialize an array to hold our results
    $matchword=array();
    
    $i=0;
    while(preg_match('/(\b[a-z\']+\b)/i', $string, $matches)) //While we can match any words with a-z or a ' in them do the following ($matches holds the item we have matched)
    {       $string = preg_replace("/\b{$matches[0]}\b/i", '', $string, -1, $count); //Remove any instances of the word we just matched, so we don;t keep continually matching the same word. $count holds how many replacements of the word occur.
            $results[$matches[0]] = $count; //Update the results array so the key is the word matched and the value is the amount of times that word occured
            $matchword[$i]= $results[$matches[0]] ;
            $i++;
    }
    
    //print_r($results); //Print the results
    
    return $matchword;
}

function keywords($word){
    //the code is adapted from: http://www.thewebsqueeze.com/forum/MySQL-f43/Getting-A-Count-For-Words-t3070.html
    $string = "$word";
    
    $string = preg_replace("/<([^>]+)>/i", '', $string); //Delete all tags in the string
    $results = array(); //Initialize an array to hold our results
    $key=array();
    $i=0;
    while(preg_match('/(\b[a-z\']+\b)/i', $string, $matches)) //While we can match any words with a-z or a ' in them do the following ($matches holds the item we have matched)
    {       $string = preg_replace("/\b{$matches[0]}\b/i", '', $string, -1, $count); //Remove any instances of the word we just matched, so we don;t keep continually matching the same word. $count holds how many replacements of the word occur.
            $results[$matches[0]] = $count; //Update the results array so the key is the word matched and the value is the amount of times that word occured
            $key[$i]=$matches[0];
            $i++;
    }
    
    //print_r($results); //Print the results
    
    return $key;
}

function maxfreq($word){
    
     //$terms=count_words($keyword);
    $terms=count_words($word);
     $max=$terms[0];
     $k=1;
     while($k<count($terms)){
          if($max<$terms[$k]){
               $max=$terms[$k];
          }
          $k++;
     }
     return $max;
}

function calculate_wq($max,$terms){
  
     $k=0;
     while($k<count($terms)){
          $wq[$k]=0.5+$terms[$k];
          $wq[$k]/=$max;
          $wq[$k]+=0.5;
          $k++;
     }
     return $wq;
}

function remove_stopwords($key,$stopwords){
        $m=0;
        $n=0;
          $keyword=array();
        while($m<count($key)){
            if (in_array($key[$m],$stopwords))
            {
                ;
            }
            else{
                $keyword[$n]=$key[$m];
                $n++;
            }
            $m++;
        }
         return $keyword;     
    }
     
    function calculate_similarity($key,$alldoc,$doc,$docwords,$max,$length,$wq){
         
          $m=0;
          $n=0;
          
          while($m<count($key)){
               $document[$m]=0;
               while($n<count($docwords)){
                    if($key[$m]==$docwords[$n]);
                    $document[$m]=$doc[$n];
                    $n++;
               }
              
               $m++;
          }
          $l=0;
          $wd=array();
          while($l<count( $document)){
            $nf=$document[$l]/$max;
            $idf=log10($alldoc/$length);
            $wd[$l]=$nf*$idf;
            $l++;
          }
         $p=0;
         $sumq2=0;
         $sumd2=0;
         $sumqd=0;
          while($p<count($wd)){
            $d=$wd[$p];
            $d2=$d*$d;
            $q=$wq[$p];
            $q2=$q*$q;
            $qd=$q*$d;
            $sumq2+=$q2;
            $sumd2+=$d2;
            $sumqd+=$qd;
          $p++;
          }
          $sqrtq2=sqrt($sumq2);
          $sqrtd2=sqrt($sumd2);
          $sumq2d2=$sqrtq2+$sqrtd2;
          $sim=$sumqd/$sumq2d2;
          return $sim;
           
        
       }


 function msort($array, $id="id", $sort_ascending=true) {
        $temp_array = array();
        while(count($array)>0) {
            $lowest_id = 0;
            $index=0;
            foreach ($array as $item) {
                if (isset($item[$id])) {
                                    if ($array[$lowest_id][$id]) {
                    if ($item[$id]<$array[$lowest_id][$id]) {
                        $lowest_id = $index;
                    }
                    }
                                }
                $index++;
            }
            $temp_array[] = $array[$lowest_id];
            $array = array_merge(array_slice($array, 0,$lowest_id), array_slice($array, $lowest_id+1));
        }
                if ($sort_ascending) {
            return $temp_array;
                } else {
                    return array_reverse($temp_array);
                }
    }




 
?>
