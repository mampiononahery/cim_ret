<?php
if (isset($_REQUEST['num'])){
        $dir=ereg_replace(' ','%20',$_REQUEST['num']);
        $filname=ereg_replace(' ','%20',$_REQUEST['fil']);		
}
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=$filname");
readfile("http://www.oooophoto.com/$dir/$filname"); 
?>