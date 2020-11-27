# Http
##ServerRequest
Based on Httpsoft/Message
handle for $_GET, $_POST, $_FILES
use
```php
$request = new ServerRequest();
$request->get(); //return $_GET
$request->get('key', 'default_value'); //return $_GET['key'] or mixed 'default_value' 

$request->post(); //return $_POST
$request->post('key', 'default_value'); //return $_POST['key'] or mixed 'default_value' 

$request->files(); //return array $_FILES
$request->files('key'); //return Psr\Http\Message\UploadedFileInterface $_FILES['key'] or null

$request->server(); //return $_SERVER
$request->server('key'); //return $_SERVER['key'] or null

$request->getMethod(); //return string POST, GET .... ($_SERVER['REQUEST_METHOD'])

$request->addQuery(array $params = []) //add to $_GET array
```
