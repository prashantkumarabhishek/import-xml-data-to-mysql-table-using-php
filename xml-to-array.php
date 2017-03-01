<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("items.xml");
$mysql_hostname = "localhost"; // Example : localhost
$mysql_user     = "root";
$mysql_password = "root";
$mysql_database = "test";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");

$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;

for ($i=0; $i < $itemCount; $i++)
{
  $title = $xmlObject->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
  $link  = $xmlObject->item($i)->getElementsByTagName('url')->item(0)->childNodes->item(0)->nodeValue;
  echo $sql   = "INSERT INTO `items` (id,title, url) VALUES (NULL,'$title', '$link')";
  mysql_query($sql);
  print "Finished Item $title n<br/>";
}