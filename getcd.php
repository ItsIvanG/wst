<?php


$q=$_GET["q"];
$g=$_GET["g"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("cd_catalog.xml");

$x=$xmlDoc->getElementsByTagName('ARTIST');

//echo "hello";
// print_r ($x);


if($g=="artists"){
  echo("<option value=\"\">Select a CD:</option>");
  $artists = [];
  $cdNodes = $xmlDoc->getElementsByTagName('CD');
  foreach ($cdNodes as $cdNode) {
    $artistNode = $cdNode->getElementsByTagName('ARTIST')->item(0);
    if ($artistNode) {
        $artist = $artistNode->nodeValue;
        if (!in_array($artist, $artists)) {
            $artists[] = $artist;
        }
    }
  }
  foreach ($artists as $artist) {
    echo("<option value=\"". $artist ."\">". $artist ."</option>");
  }
}
else {
    for ($i=0; $i<=$x->length-1; $i++) {
      //Process only element nodes
      if ($x->item($i)->nodeType==1) {
        if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
          $y=($x->item($i)->parentNode);
        }
      }
    }
    
    $cd=($y->childNodes);
    for ($i=0;$i<$cd->length;$i++) {
      //Process only element nodes
      if ($cd->item($i)->nodeType==1) {
        echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
        echo($cd->item($i)->childNodes->item(0)->nodeValue);
        echo("<br>");
      }
    }
}
?>