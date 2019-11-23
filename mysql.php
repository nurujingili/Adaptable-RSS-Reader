<?php

/**
 * create MYSQL connection
 * @Nuru jingili
 * @copyright 2010
 */

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("reader", $con)or die ("Could not open database");


?>