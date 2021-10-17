<?php
session_start();
require_once ('./vendor/autoload.php');
require_once('./router/Router.php');
require_once('./config/config.php');

 $router = new Router();
 $router->execute();
