<?php
use App\classes\Database;
use App\classes\ErrorHandler;
use App\routing\RouteDispatcher;
/**
 * Start session if not already started
 */

if(!isset($_SESSION)) session_start();
//load enviroments variable
require_once __DIR__ . '/../app/config/_env.php';

//instantioate db class

new App\classes\Database();

//set custom error handler
set_error_handler([new ErrorHandler(), 'handleErrors']);


require_once __DIR__ . '/../app/routing/routes.php';

new RouteDispatcher($router);
