<?php

function base_dir($dir='') {
	$path = include '../config/path.php';
	return $path[$dir];
}