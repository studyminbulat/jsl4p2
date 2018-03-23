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
    header('Access-Control-Allow-Origin: *');
    header('Content-type: text/plain; charset=utf-8');
    header('Access-Control-Allow-Methods: GET,POST,DELETE');
  });
$app->get('/print', function(){
    header('Content-type: text/plain; charset=utf-8');
    echo file_get_contents(basename(__FILE__));
  });
*/
$app->get('/author', function(){
    //header('Content-type: text/html; charset=utf-8');
    $text = '<h4>Bulat Minnemullin</h4>';
	return new Response ($text, 200, array('X-Status-Code'=>200));
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