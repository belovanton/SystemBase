<?php

function authentication_required() {
    $accounts = array(
        'admin' => '555'
    );

	if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
        $username = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];
        $hash = md5($username . $password);
		$key = md5($username);
		if (isset($_COOKIE[$key]) && $_COOKIE[$key] == $hash) {
			return false;
		}
		if (isset($accounts[$username]) && $accounts[$username] == $password) {
			setcookie($key, $hash);
			return false;
		}
	}
	header('WWW-Authenticate: Basic realm="Mattino dev environment"');
    header('HTTP/1.0 401 Unauthorized');
    return true;
}
