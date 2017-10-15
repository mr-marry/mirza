<?php
session_start();
if(!is_dir('tmpa/')){ mkdir('tmpa/'); }
if($_POST['access_token']) {
	$token2 = $_POST['access_token'];
	if(preg_match("'access_token=(.*?)&expires_in='", $token2, $matches)){
		$token = $matches[1];
			}else{
		$token = $token2;
	}
$me = me($token);
if($me[id]){
$_SESSION['id'] = $me[id];
$_SESSION['name'] = $me[name];
$_SESSION['access_token'] = $token;
header('Location: index.php');
}else{
			session_destroy();
header('Location: index.php?i=Token Expired')
;
}
}
function me($access) {
return json_decode(auto('https://graph.facebook.com/me?access_token='.$access),true);
}

function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }