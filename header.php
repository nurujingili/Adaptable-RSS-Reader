<?php

/**
 *has two funcrions header and footer.
 *displays the header and footer for the application
 * @Nuru Jingili
 * @copyright 2010
 */

//prints an HTML header
function do_html_header($title)
{
  
  ?>
    <html>
      <head>
        <title><?php echo $title;?></title>
        <link rel="stylesheet" type="text/css" href="rss_reader.css"/>
        <script src="rss.js" type="text/javascript"></script>
    
        <h1>&nbsp;Adaptable RSS reader</h1>
        <hr />
    
    
      
  <?php
  
    require_once('menu.php');//call to file for displaying menu
}
//prints an HTML footer
function do_html_footer()
{
 
?><div align='right'>
    <hr />
    
   <h3> © 2010 Adaptable RSS Reader</h3>
  </table>
     </div>
  </body>
  </html>

<?php
}

?>