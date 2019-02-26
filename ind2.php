<?php
error_reporting(E_ALL);

$myfile = fopen("short3.xml", "r") or die("Unable to open file!");
$stream = fread($myfile,filesize("data.xml"));
fclose($myfile);
//echo $stream;
//$stream = readfile('data.xml');
$xml = new SimpleXMLElement($stream);
//print_r($xml);
//RecurseXML($xml);
//echo $xml.current($xml);
//recurs($xml, 0);
rec($xml, 0); echo "<br/>";

//var_dump($xml->count());
//var_dump($xml->children());

//print_r($xml->children());
rec2($xml);
function rec2($xml){
    foreach($xml->children() as $key=>$val){
        echo "\"$key\"";
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