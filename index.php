<?php
require 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
$app = new Silex\Application();

$app->get('/hello/{name}', function ($name) use ($app) {
	return 'Hello '.$app->escape($name);
});
	
$app->get('/public', function(){
	$headers = array(
		'Access-Control-Allow-Origin: *',
		'Content-type: text/plain'=>'charset=utf-8',
		'Access-Control-Allow-Methods'=>'GET,POST,DELETE'
	);
	return new Response ('', 200, $headers);
  });
$app->get('/print', function(){
    $headers = array('Content-Type' =>'text/plain; charset=utf-8');
    $text = file_get_contents(basename(__FILE__));
	return new Response ($text, 200, $headers);
  });

$app->get('/author', function(){
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
  });

function getMath($operation, $x1, $x2, $type){
	switch ($operation) {
		case "add":
			$text = "Сумма";
			$value = $x1 + $x2;
			break;
		case "sub":
			$text = "Разница";
			$value = $x1 - $x2;
			break;
		case "mpy":
			$text = "Произведение";
			$value = $x1 * $x2;
			break;
		case "div":
			$text = "Деление";
			$value = $x1 / $x2;
			break;
		case "pow":
			$text = "Степень";
			$value = pow($x1 , $x2);
			break;
			}
	return "$type";
	//if ($type)
	//	return "{\"$text\":$value}";
	//else
	//	return "<h1>$text:</h1><h2><span>$value</span></h2>";
}   
$app->get('/{operation}/{x1}/{x2}', function ($operation, $x1, $x2, Request $request) use ($app) {
	//$type = $request->request->headers->get('Content-Type');
	$type = $request->headers->get('Content-Type');
	return getMath($operation, (int)$x1, (int)$x2, $type);
});
$app->run();