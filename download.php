<?php
    $filename = $_GET['filename'];
    header('content-disposition:attachment;filename='.basename($filename)); 
    header('content-length:'. filesize($filename));
    readfile($filename);
?>