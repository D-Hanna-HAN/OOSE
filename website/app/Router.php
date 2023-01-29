<?php 

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\NoConfigurationException;

class Router
{
    //gets the current url and tries to match it to a existing route, if the route exists it wil call the controller and function connected to that routes 
    public function __invoke(RouteCollection $routes)
    {
        $context = new RequestContext();
        $request = Request::createFromGlobals();
        $context->fromRequest(Request::createFromGlobals());
        $matcher = new UrlMatcher($routes, $context);
        try {
            $arrayUri = explode('?', $_SERVER['REQUEST_URI']);
            $matcher = $matcher->match($arrayUri[0]);
    
            array_walk($matcher, function(&$param)
            {
                if(is_numeric($param)) 
                {
                    $param = (int) $param;
                }
            });
    
            $className = '\\App\\Controllers\\' . $matcher['controller'];
            $classInstance = new $className();
    
            $params = array_merge(array_slice($matcher, 2, -1), array('routes' => $routes));

            call_user_func_array(array($classInstance, $matcher['method']), $params);
            
        } catch (MethodNotAllowedException $e) {
            echo 'Route method is not allowed.';
        } catch (ResourceNotFoundException $e) {
            echo 'you have no access to this page.';
        } catch (NoConfigurationException $e) {
            echo 'Configuration does not exists.';
        }
    }
}

// Invoke
$router = new Router();
$router($routes);