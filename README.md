# Laravel API Error Handler
Laravel API Error Handler is a package designed to handle exceptions when developing APIs in Laravel.

This package is a fork of [hamidreza2005/laravel-api-error-handler](https://github.com/hamidreza2005/laravel-api-error-handler) to work with Laravel 9 and below.
## :inbox_tray: Installation
You can install this package via Composer:
```bash
composer require harrisonratcliffe/laravel-api-error-handler
```
After installation, run the following command to publish the configuration files:
```bash
php artisan vendor:publish --tag laravel-api-error-handler
```
## :gear: Configuration
To configure this package, go to `config/api-error-handler.php`.
```php
<?php  
  
return [  
  "Symfony\Component\HttpKernel\Exception\NotFoundHttpException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\NotFoundException",  
  "ErrorException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ServerInternalException",  
  "Illuminate\Database\QueryException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ServerInternalException",  
  "Illuminate\Auth\AuthenticationException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\AccessDeniedException",  
  "Symfony\Component\HttpKernel\Exception\HttpException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\AccessDeniedException",  
  "Illuminate\Validation\ValidationException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ValidationException", 
  "Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException"=>"\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\NotFoundException", 
];
```
This package provides some common exceptions like ModelNotFound. If you want to customize it, you can do it like this:
```php
<?php  
  
return [  
  "Your Error Namespace" => "the class that handle this error",   
];
```
|Class| Status Code  | Message|
|--|--|--|
|NotFoundException  |404  |Not Found|
|ServerInternalException|500|Server Internal Error
|AccessDeniedException|403|Access Denied|
|ValidationException|422|it returns all errors in validation|
|DefaultException|the status code of the Error|the message of the Error|

## :rocket: Let This Package Handle Your Errors
Go to `app\Exceptions\Handler.php` and add the following code:


```php
<?php  
  
namespace App\Exceptions;  
  
use harrisonratcliffe\LaravelApiErrorHandler\Traits\ApiErrorHandler;  
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;  
use Throwable;  
  
class Handler extends ExceptionHandler  
{  
	  use ApiErrorHandler;  
	  
	  /**  
	 * A list of the exception types that are not reported. * * @var 		array  
	 */  
	 protected $dontReport = [  
		  //  
	  ];  
  
	  /**  
	 * A list of the inputs that are never flashed for validation exceptions. * * @var array  
	 */  
	 protected $dontFlash = [  
		  'password',  
		  'password_confirmation',  
	 ];  
	  /**  
	 * Register the exception handling callbacks for the application. * * @return void  
	 */
	 public function register()  
	 {
	   //  
	 }  
  
	 public function render($request, Throwable $e)  
	 {
		  return $this->handleError($this->prepareException($e));  
	 }
 }
```
:writing_hand: Create Your Own Error Handler
If you want to create your own handler instead of using the default handler, you can create a class that extends `harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ExceptionAbstract` in any location.

For example:
```php
<?php  
  
  
namespace myNamespace;  
  
  
class MyException extends ExceptionAbstract  
{  
	  public function handleStatusCode():void  
	  {  
		  $this->statusCode = 2018;  
	  }
	   
	  public function handleMessage():void  
	  {  
		  $this->message = "My Message";  
	  }
 }
```
And you can then declare your handler in `config/api-error-handler.php`:
```php
<?php

return [
	"ErrorException" => "myNamespace\MyException"
];
```
### ❗ Notice
If an unknown exception appears, this package automatically shows it in the response. However, you can prevent this by setting `APP_DEBUG` to `false` in your `.env` file. When `APP_DEBUG` is `false`, "Server Internal Error" is shown in the response.
## :scroll: License  
  
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.  
  
--------------------  
  
### :raising_hand: Contributing  
If you find an issue, or have a better way to do something, feel free to open an issue , or a pull request.  
