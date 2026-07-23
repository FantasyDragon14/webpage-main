<?php
if ($_SERVER['PATH_INFO'] == '') {
	$_SERVER['PATH_INFO'] = preg_replace('/\?(.*)$/i', '', substr($_SERVER['REQUEST_URI'], strlen(preg_replace('/([^\/]*)$/i', '', $_SERVER['SCRIPT_NAME']))));
}
