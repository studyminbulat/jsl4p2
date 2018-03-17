<?php

require 'vendor/autoload.php';

$app = new Silex\Application();

$date = new class {
	function getDate() { return date("d/m/Y h:i"); }
};

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

$app->get('/author', function(){
    header('Content-type: text/html; charset=utf-8');
    echo '<h4>Bulat Minnemullin</h4>';
  });
$app->get('/info', function(){
    return phpinfo();
  });

$app->get('/', function(){
	return $date -> getDate();
  });
  
echo "1111111";
