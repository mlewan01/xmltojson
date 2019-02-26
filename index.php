<?php
// readfile('data.xml');
//    echo 'dupa';
//    echo $stream;

    echo "<br/>";

    $myfile = fopen("data.xml", "r") or die("Unable to open file!");
    //echo fread($myfile,filesize("data.xml"));
    fclose($myfile);
?>