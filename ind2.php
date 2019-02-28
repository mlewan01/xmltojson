<?php
error_reporting(E_ALL);

$myfile = fopen("short6.xml", "r") or die("Unable to open file!");
$stream = fread($myfile,filesize("data.xml"));
fclose($myfile);
//$stream = str_replace(array("\r", "\n"), '', $stream);
//$stream = trim(preg_replace('/\s+/', '', $stream)); // all white spaces
$stream = trim(preg_replace('/(\>)\s*(\<)/m', '$1$2', $stream)); // white spaces in between tags

//$stream = readfile('data.xml');
//$xml = new SimpleXMLElement($stream);
$xml  = new SimpleXmlIterator($stream);
echo "{"; xml2json($xml); echo "}";
//$js = getThatJson();
//var_dump($js);

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
    $child_count = 0;
    $current = $xml->getName();
    echo "\"$current\"";
    $children = $xml->count();
//    echo "$children-$cc-$ss"; // helpful test
    echo ":";
    if($children > 0){
        echo "{";
    }
    foreach($xml as $key=>$val){ // walking the children
        $child_count++;
        if($val->attributes()[0] != NULL){  // check for attributes presence
            foreach($val->attributes() as $k2=>$v2){
                $val->addChild("@$k2", $v2); // adding attributes to current xml node( so it can be later retrived and printed in "@node:value" format
            }
        }
        if(rec4($val, $child_count,$children) == 0){ // recursive call the the fu
            echo "\"$val\"";
//            echo "<b>\"$val\"</b>$children-$cc-$ss"; // helpful test
        }
        if($children - $child_count > 0){
            echo ", ";
        }
    }
    if($children > 0){
        echo "}";
    }
    return $child_count;
}
//RecurseXML($xml);
//echo $xml.current($xml);
//recurs($xml, 0);
//rec($xml, 0); echo "<br/>";

//var_dump($xml->count());
//var_dump($xml->children());
//$xml->rewind();
//var_dump($xml->current());
//echo $xml->key();
//print_r($xml->children());
//echo "{"; rec4($xml);echo "}<br/><br/>";
//echo "{";
//rec2($xml);
//rec3($xml);
//echo "}";
function rec4($xml, $cc=0, $ss=0){
    $child_count = 0;
    $current = $xml->getName();
    echo "\"$current\"";
//    $xml-
    $children = $xml->count();
//    echo "$children-$cc-$ss";
    echo ":";
    if($children > 0){
        echo "{";
    }
    foreach($xml as $key=>$val){
        $child_count++;

        if(rec4($val, $child_count,$children) == 0){
            echo "<b>\"$val\"</b>";
//            echo "key:$key-val:$val";
//            echo "<b>\"$val\"</b>$children-$cc-$ss";
        }
        if($val->attributes()[0] != NULL){

            foreach($val->attributes() as $k2=>$v2){
                echo " \"@$k2\": <b>\"$v2\"</b>";
            }
//                var_dump($val->attributes());
        }
        if($children - $child_count > 0){
            echo ", ";
        }
    }
    if($children > 0){
        echo "}";
    }
    return $child_count;
}
//{"product":{"Type":"finance","company":"bank","name":"ING","product":{"Type":"finance","company":"bank"}""}}
function rec3($xml){
    $child_count = 0;
    $current = $xml->getName();
    echo "\"$current\"";
    echo ":";

    $xml->rewind();
    var_dump($xml->__toString());
    var_dump($xml->valid());
    var_dump($xml->hasChildren());
    var_dump($xml->key());
    var_dump($xml->getName());
    var_dump($xml->count());

    foreach($xml as $key=>$val){
        $child_count++;
//        $current = $val->getName();
//        echo ">$current<";
        
        if($val instanceof SimpleXmlIterator) {
//            $val->rewind();
//            echo $val->__toString();
//            var_dump($val->valid());
//            var_dump($val->hasChildren());
//            var_dump($val->key());
//            var_dump($val->getName());
//            var_dump($val->count());
            if($val->__toString()==""){
//                echo "{";
//                echo "true";
            }else{
//                echo "false";
//                echo "{";
            }
            echo "{";
        }

        if(rec3($val) == 0){
            echo " <b>\"$val\"</b> ";
        }
        if($val instanceof SimpleXmlIterator) {

            if($val->__toString()=="") {
                echo "}";
            }
//            echo "}";
        }
    }
    return $child_count;
}


function rec2($xml){
    $current = $xml->getName();
    echo "\"$current\"";
    foreach($xml->children() as $key=>$val){
//        echo "\"$key\"";
//        var_dump($key);
//        var_dump($val);
        if($val instanceof SimpleXMLElement) {
            echo ":";
        }
    }
}




function rec($xml, $depth){
    $child_count = 0;
    if($xml->count() > 0){
//        echo $xml->count();
        foreach($xml->children() as $key => $val){
            $tab = depth($depth);
            echo "$tab \"$key\":";
            if($val instanceof SimpleXMLElement){
                if(is_string($val)){
                    echo ">>>>>>>>>>>>>>>>>>>>>it is string<<<<<<<<<<<<<<<";
                }
//                var_dump($val[0]);
                echo "{";
                echo "<br/>";
            }
            if($val->attributes()[0] != NULL){
                $tab1 = depth($depth+1);
                foreach($val->attributes() as $k2=>$v2){
                    echo "$tab1 \"@$k2\": <b>\"$v2\"</b><br/>";
                }
//                var_dump($val->attributes());
            }
            $child_count++;
            if(rec($val, ++$depth) == 0){
                print( " <b>$val</b> <br/>");
            }else{
//                echo "<br/>";
            }
        }
    }
    return $child_count;
}

    function recurs($xml,$depth){
        $child_count=0;
        foreach($xml as $k=>$v){
            $tab = depth($depth);
            echo "$tab  $k depth: $depth<br/>";
            $child_count++;
            if(recurs($v, $depth++) == 0){
                print( " <b>$v</b> <br/>");
            }
        }
        return $child_count;
    }

    function depth($depth){
        $s = '';
//        for($i = 0; $i<$depth; $i++){ $s = "$s&nbsp;&nbsp;&nbsp;&nbsp;";}
        for($i = 0; $i<$depth; $i++){ $s = "$s....";}
        return $s;
    }
    function RecurseXML22($xml,$parent=""){
        $in="....";
        $child_count = 0;
        foreach($xml as $key=>$value)
        {
//            print_r($value);
            $child_count++;
//            if(RecurseXML($value,$parent.".".$key) == 0)  // no childern, aka "leaf node"
            if(RecurseXML($value,$in) == 0)  // no childern, aka "leaf node"
            {
//                print($parent . "." . (string)$key . " = " . (string)$value . "<BR>\n");
                print($in . (string)$key . " = " . (string)$value . "<BR>\n");
            }
        }
        return $child_count;
    }

    function RecurseXML($xml,$parent=""){
        $in="....";
        $child_count = 0;
        foreach($xml as $key=>$value)
        {
            $child_count++;
                if(RecurseXML($value,$parent.".".$key) == 0)  // no childern, aka "leaf node"
//                if(RecurseXML($value,$in) == 0)  // no childern, aka "leaf node"
            {
                print($parent . "." . (string)$key . " = " . (string)$value . "<BR>\n");
//                print($in . (string)$key . " = " . (string)$value . "<BR>\n");
            }
        }
        return $child_count;
    }
?>