<?php

// session_start();
$file  = $_SESSION['download'];
header("Refresh:1;");
header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
header("Content-Type: application/force-download");













header("Content-Length: " . filesize($file));



header("Connection: close");


readfile($file);
unlink($file);

unset($file);

die;
