[![Build Status](https://scrutinizer-ci.com/g/Enjoyzz/http/badges/build.png?b=main)](https://scrutinizer-ci.com/g/Enjoyzz/http/build-status/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Enjoyzz/http/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/Enjoyzz/http/?branch=main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Enjoyzz/http/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)
[![Code Coverage](https://scrutinizer-ci.com/g/Enjoyzz/http/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/Enjoyzz/http/?branch=main)

# Http

## ServerRequest

Based on [Httpsoft/Message](https://github.com/httpsoft/http-message)
handle for $_GET, $_POST, $_FILES

Instead of *Httpsoft/Message* you can use any library that implements the interface *ServerRequestInterface*

use

```php
use Enjoys\Http\ServerRequest;
$request = new ServerRequest();  
// or
// $request =  new ServerRequest(\HttpSoft\ServerRequest\ServerRequestCreator::createFromGlobals())

$request->get(); //return $_GET
$request->get('key', 'default_value'); //return $_GET['key'] or mixed 'default_value' 

$request->post(); //return $_POST
$request->post('key', 'default_value'); //return $_POST['key'] or mixed 'default_value' 

$request->files(); //return array $_FILES
$request->files('key'); //return Psr\Http\Message\UploadedFileInterface $_FILES['key'] or null

$request->server(); //return $_SERVER
$request->server('key'); //return $_SERVER['key'] or null

$request->getMethod(); //return string POST, GET .... ($_SERVER['REQUEST_METHOD'])

$request->addQuery($params = []); //add to $_GET array
```
