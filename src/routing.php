<?php
/**
 * This file dispatch routes.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */
//We have the route typed by the user

//we split all the parts defined
$routeParts = explode('/', ltrim($_SERVER['REQUEST_URI'], '/') ?: HOME_PAGE);

//on redirige vers le controller associé à cette route
$controller = 'App\Controller\\' . ucfirst($routeParts[0] ?? '') . 'Controller';


//On recupere le nom associé à la route
$method = $routeParts[1] ?? '';
$vars = array_slice($routeParts, 2);

if (class_exists($controller) && method_exists(new $controller(), $method)) {
    echo call_user_func_array([new $controller(), $method], $vars);
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}
