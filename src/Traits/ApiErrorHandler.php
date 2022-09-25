<?php

namespace harrisonratcliffe\LaravelApiErrorHandler\Traits;

use harrisonratcliffe\LaravelApiErrorHandler\Exceptions\DefaultException;
use harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ServerInternalException;
use Illuminate\Support\Facades\Response;

trait ApiErrorHandler
{
    public function handleError($exception)
    {
        $exceptions = config("api-error-handler") ?? [];
        $class = array_key_exists(get_class($exception),$exceptions) ? $exceptions[get_class($exception)] : (config('app.debug') ? DefaultException::class : ServerInternalException::class );
        $handler = new $class($exception);
        $handler->handleStatusCode();
        $handler->handleMessage();
        return Response::json(["error"=>$handler->getMessage()],$handler->getStatusCode(),["Content-Type"=>"application/json"]);
    }
}
