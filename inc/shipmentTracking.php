<?php 
$postid = $_GET['postid'];

// $url = "http://www.cn.dhl.com/shipmentTracking?AWB=7982591912&countryCode=cn&languageCode=zh&_=1434553475231";
$url = "http://www.kuaidi100.com/query?type=dhl&postid=". $postid . "&id=1&valicode=&temp=0.5715253283269703";

$data = file_get_contents($url);
echo $data;
 ?>