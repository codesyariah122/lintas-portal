<?php
/**
 * @author Puji Ermanto <pujiermanto@gmail.com>
 * @return {RouteSystem | Autoload}
 * */

require_once 'vendor/autoload.php';

use App\Config\Autoload as Load;
use System\RouteSystem;

Load::go();

new RouteSystem();
