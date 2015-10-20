<?php
if ( !isset( $_POST['action'] ) )
{
    header('400 Bad Request');
    exit;
}
try
{
    define ('AJAX', true);
    define ('ROOT', dirname(__FILE__) .'/' );

    require_once(dirname(__FILE__) . '/libs/autoload.php');
    $action = $_POST['action'];

    $allowedActions = [
        "getChartJSData" => "getChartJSDataController"
    ];

    $className = $allowedActions[$action];

    $namespace = '\\zorancco\\Ajax\\Controller\\' . $className;

    $fileName = __DIR__ . '/libs/ajaxHandlers/' . $className . '/' . $className . '.php';

    require_once $fileName;

    $controller = new $namespace();
    $result = $controller->execute($_REQUEST);

    echo json_encode( $result );

} catch( Exception $e )
{
}
