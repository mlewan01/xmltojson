<?php

$s = getThatJson("/xmltojson/ind2.php");
//$s = str_replace(  array("}","{"), "X", $s);
echo $s;
/** retrives the json string through http
 * @return false|string
 */
function getThatJson($path){
    $file = file_get_contents($_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_ADDR"].$path);
//    $file = file_get_contents($_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_ADDR"].$_SERVER['PHP_SELF']);
//    $file = echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_ADDR"].$_SERVER['PHP_SELF'];
    return $file;
}
?>