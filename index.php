<?php
//error_reporting(E_ALL); 
//ini_set('display_errors', 1); 
require 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Response;
//var_dump($_GET);
$app = new Silex\Application();


/*
$app->get('/hello/{name}', function ($name) use ($app) {
	return 'Hello '.$app->escape($name);
});
	
$app->get('/public', function(){
    
	$headers = (
		'Access-Control-Allow-Origin: *',
		'Content-type: text/plain'=>'charset=utf-8',
		'Access-Control-Allow-Methods'=>'GET,POST,DELETE'
	);
	return new Response ('', 200, $headers);
  });*/
$app->get('/print', function(){
    $headers = ('Content-type' =>'text/plain; charset=utf-8');
    //$text = ""; 
	//file_get_contents(basename(__FILE__));
	return new Response ("", 200, $headers);
  });

$app->get('/author', function(){
    //header('Content-type: text/html; charset=utf-8');
    $text = '<h4>Bulat Minnemullin</h4>';
	$headers = array('Content-Type'=>'text/html; charset=utf-8');
	return new Response ($text, 200, $headers);
  });
$app->get('/info', function(){
    return phpinfo();
  });

$app->get('/', function(){
	$date = new class {
		function getDate() { return date("d/m/Y h:i"); }
	};
	return $date -> getDate();
	//return "1";
  });
$app->run();