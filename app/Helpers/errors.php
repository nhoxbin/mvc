<?php

function show404error($name) {
	die('404 ' . $name . ' not found!!!');
}

function showError($errno, $errstr, $errfile, $errline) {
	echo 'error code: ' . $errno . '<br />';
	echo 'error: ' . $errstr . '<br />';
	echo 'file: ' . $errfile . ' at line ' . $errline. '<br />';
}