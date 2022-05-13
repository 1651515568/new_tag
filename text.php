<?php
$json_string = file_get_contents("text.json");
$data = json_decode($json_string,true);
// $tag = array(
// 	"name_1"=>array(
// 			"url"=>"www.ada.com",
// 			"ico"=>"www.dad.com.png"
// 			),
// 	"name_2"=>array(
// 			"url"=>"www.wsw.com",
// 			"ico"=>"www.sws.com.png"
// 			)
// );
// $json_string = json_encode($tag);
// file_put_contents("text.json",$json_string);
foreach ($data as $name=>$key) {
	$url = $key['url'];
	$ico = $key['ico'];
	echo "<a href=$url style='display:block;float:left;width:55px;height:76px;text-align:center;text-decoration: none;color:#c62828'><img src=$ico style='width:55px;margin: 2px;border: 1px solid #cccccc;'/><div>$name</div></a>";
}