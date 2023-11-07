## Examples

```php
use MMantai\WebRouter\Router;

//create a router object and register routes
$router = new Router();
$router->registerRoute("/test/{var}", function ($var) {    
    echo $var;
});

$router->registerRoute("/site/{var}", function ($var) {    
    include __DIR__ ."/static/site.php";
});

$router->start();
```

## TODO
- Middleware support for routes