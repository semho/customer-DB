<?php
require __DIR__ . '/Config/url.php';
require __DIR__ . '/autoload.php';


//$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = 'App\\Controllers\\' . ucfirst($ctrl);
//$method = !empty($_GET['method']) ? $_GET['method'] : 'AllShow';
$methodName = 'action' . $method;

try {
    $controller = new $ctrlClassName;
    $controller->$methodName();
} catch (\App\Exceptions\E404Exception $e) {
    echo $e->getMessage();
} catch (\App\Exceptions\E403Exception $e) {
    echo $e->getMessage();
}







