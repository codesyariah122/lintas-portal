<?php
/**
 * @author Puji Ermanto <pujiermanto@gmail.com>
 * @return {RouteSystem | Autoload}
 * */

require_once 'vendor/autoload.php';

use App\Config\Autoload;
use System\RouteSystem;

Autoload::go();

RouteSystem::generateRoute();
