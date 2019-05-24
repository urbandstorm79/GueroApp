<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 08/04/2019
 * Time: 08:11 PM
 */
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/login.php');
	exit;
