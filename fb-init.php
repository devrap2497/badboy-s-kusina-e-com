<?php 

//start the session


//include autoload file from vendor folder

require './vendor/autoload.php';


$fb = new Facebook\Facebook([
	'app_id' 	 			=> '316665563437489',
	'app_secret' 			=> '874f32bd272010c55abb0d722790d66c',
	'default_graph_version' => 'v2.10'
]);

	$helper = $fb->getRedirectLoginHelper();
	$login_url = $helper->getLoginUrl("http://localhost/badboy's-kusina/");

	try {
		  $accessToken = $helper->getAccessToken();
		  if(isset($accessTokenToken)){
		  	$_SESSION['access_token'] = (string)$access_token;
		  	header("Location: index.php");
		  }
	} catch (Exception $e) {
		echo $e->getTraceAsString();
		
	}

	if(isset($_SESSION['access_token'])){
		try {
			$fb->setDefaultAccessToken($_SESSION['access_token']);
			$res = $fb->get('/me?locale_US&fields=name, email');
			$user = $res->getGraphuser();
		} catch (Exception $e) {
			echo $e->getTraceAsString();
		}
	}


?>