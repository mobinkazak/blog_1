<?php 
ini_set("display_errors","on");
error_reporting(-1);
ob_start();
session_start();
date_default_timezone_set("Asia/Tehran");

$page=isset($_GET['page'])?(int)$_GET['page']:1;
if ($page <= 0)
	$page=1;


require_once 'config.php';
require_once 'lib/base.php';
require_once 'lib/jdf.php';

if (strstr($_SERVER['REQUEST_URI'],'/admin/')) {
	require_once 'lib/backend.php';
	$backend=new Backend();
}else{
	require_once 'lib/frontend.php';
	$frontend=new Frontend();
	$cid=$frontend->toInt($frontend->get('cid'));
	$c=$frontend->toInt($frontend->get('c'));
	$s=$frontend->toInt($frontend->get('s'));
	$title=$frontend->safeString($frontend->get('title'));
	$url="search.php?c=$c&s=$s&title=$title";

}