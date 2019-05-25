<?php
error_reporting(E_ALL);

$xml = getData("data.xml");
$au = xml2json($xml);

//echo "{"; echo $au[1]; echo "}";
echo "{" . $au[1] . "}";

/** gets the data ready for processig
 * @param $data
 * @return SimpleXmlIterator
 */
function getData($data){
//    $myfile = fopen($data, "r") or die("Unable to open file!");
//    $stream = fread($myfile,filesize("data.xml"));
//    fclose($myfile);
    $stream = '
<product><Type>finance-wow</Type><company>bank</company><name>ING</name><prod2 id="test" color="red"><Ty>finance</Ty><company>bank</company></prod2></product>
    ';
//      $stream = str_replace(array("\r", "\n"), '', $stream);
//      $stream = trim(preg_replace('/\s+/', '', $stream)); // all white spaces
    $stream = trim(preg_replace('/(\>)\s*(\<)/m', '$1$2', $stream)); // white spaces in between tags

//      $stream = readfile('data.xml');
//      $xml = new SimpleXMLElement($stream);
    $xml  = new SimpleXmlIterator($stream);
    return $xml;
}

/** retrives the json string through http
 * @return false|string
 */
function getThatJson(){
    return file_get_contents($_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_ADDR"].$_SERVER['PHP_SELF']);
//    echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_ADDR"].$_SERVER['PHP_SELF'];
}

/** converts xml to json
 * @param $xml SimpleXmlIterator object
 * @param int $cc Children count
 * @param int $ss Syblings count
 * @return int Curent child
 */
function xml2json($xml, $cc=0, $ss=0){
    $out='';     $xmlarr = array();
    $child_count = 0;
    $current = $xml->getName();
    $out .= "\"$current\"";
    $children = $xml->count();
//    echo "$children-$cc-$ss"; // helpful test
    $out .= ":";
    if($children > 0){
        $out .= "{";
    }
    foreach($xml as $key=>$val){ // walking the children
        $child_count++;
        if($val->attributes()[0] != NULL){  // check for attributes presence
            foreach($val->attributes() as $k2=>$v2){
                $val->addChild("@$k2", $v2); // adding attributes to current xml node( so it can be later retrived and printed in "@node:value" format
            }
        }
        $xmlarr = xml2json($val, $child_count,$children);
        $out .= $xmlarr[1];
        if($xmlarr[0] == 0){ // recursive call the the fu
            $out .= "\"$val\"";
//            echo "<b>\"$val\"</b>$children-$cc-$ss"; // helpful test
        }
        if($children - $child_count > 0){
            $out .= ", ";
        }
    }
    if($children > 0){
        $out .= "}";
    }
    return array($child_count, $out);
}
?>