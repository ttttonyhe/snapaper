<?php
if(isset($_GET["file"])){
    // Get parameters
    $file = urldecode($_GET["file"]); // Decode URL-encoded string
    
    // Process downlo
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        echo readfile($filepath);
        exit;
}
?>