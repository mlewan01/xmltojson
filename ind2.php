<?php
error_reporting(E_ALL);

$myfile = fopen("short.xml", "r") or die("Unable to open file!");
$stream = fread($myfile,filesize("data.xml"));
fclose($myfile);
//echo $stream;
//$stream = readfile('data.xml');
$xml = new SimpleXMLElement($stream);
//print_r($xml);
//RecurseXML($xml);
//echo $xml.current($xml);
//recurs($xml, 0);
rec($xml, 0);
function rec($xml, $depth){
    $child_count = 0;
    if($xml->count() > 0){
//        echo $xml->count();
        foreach($xml->children() as $key => $val){
            $tab = depth($depth);
            echo "$tab $key";
            if($val instanceof SimpleXMLElement){  echo "<br/>";}
            if($val->attributes()[0] != NULL){
                echo "<b>DUPA </b><br/>";
//                var_dump($val->attributes());
            }
            $child_count++;
            if(rec($val, ++$depth) == 0){
                print( " <b>$val</b> <br/>");
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