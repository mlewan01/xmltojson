<?php
error_reporting(E_ALL);

$myfile = fopen("short.xml", "r") or die("Unable to open file!");
$stream = fread($myfile,filesize("data.xml"));
fclose($myfile);

//$stream = readfile('data.xml');
$xml = new SimpleXMLElement($stream);
//
RecurseXML($xml);


    function RecurseXML($xml,$parent=""){
        $in="....";
        $child_count = 0;
        foreach($xml as $key=>$value)
        {
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
?>