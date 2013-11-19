<?php
require '../src/facebook.php';

$facebook = new Facebook(array(
		'appId'  => 'アプリケーションID',
		'secret' => 'シークレットID',
));

$user = $facebook->getUser();
if ($user) {
	$logoutUrl = $facebook->getLogoutUrl();
} else {
	$loginUrl = $facebook->getLoginUrl(array("scope" => ''));
}
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta charset="utf8" />
<title>php-sdk</title>
<style>
body {
	font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
}

h1 a {
	text-decoration: none;
	color: #3b5998;
}

h1 a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>
	<h1>php-sdk</h1>
	<?php echo urldecode($logoutUrl);?>
	<?php if ($user): ?>
	<a href="<?php echo $logoutUrl; ?>">Logout</a>
	<?php else: ?>
	<a href="<?php echo $loginUrl; ?>">Login</a>
	<?php endif ?>

	<h3>PHP Session</h3>
	<pre>
		<?php print_r($_SESSION); ?>
	</pre>

	<?php if ($user): ?>
	<?php
	try {
		$access_token = $facebook->getAccessToken();
		$start_time = time() + (1 * 24 * 60 * 60);
		$end_time = time() + (2 * 24 * 60 * 60);
		$event_param = array(
				"name" 			=> "The event title",
				"description"	=> "Description",
				"start_time" 	=> date("c", $start_time),
				"end_time" 		=> date("c", $end_time),
				"privacy_type"	=> "OPEN",
				"location" 		=> "Tokyo"
		);
		var_dump($event_param);
		$ret = $facebook->api('/me/events', "POST", $event_param);
		var_dump($ret);
	} catch (FacebookApiException $e) {
		if ($e->getType() == "OAuthException") {
			$login_url = $facebook->getLoginUrl( array(
					'scope' => 'create_event'
			));
			echo 'イベント投稿用の権限が有りませんでした。<br /><a href="' . $login_url . '">イベント投稿用の権限を取得します</a>';
		} else {
			echo $e->getMessage();
		}
	}
	?>
	<?php else: ?>
	<strong><em>You are not Connected.</em> </strong>
	<?php endif ?>
</body>
</html>
