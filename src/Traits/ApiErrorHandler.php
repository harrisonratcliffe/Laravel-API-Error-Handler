<?php

namespace harrisonratcliffe\LaravelApiErrorHandler\Traits;

use App\Traits\HttpResponses;
use harrisonratcliffe\LaravelApiErrorHandler\Exceptions\DefaultException;
use harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ServerInternalException;
use Illuminate\Support\Facades\Response;

trait ApiErrorHandler
{
    use HttpResponses;

    public function handleError($exception)
    {
        $exceptions = config("api-error-handler") ?? [];
        $class = array_key_exists(get_class($exception),$exceptions) ? $exceptions[get_class($exception)] : (config('app.debug') ? DefaultException::class : ServerInternalException::class );
        $handler = new $class($exception);
        $handler->handleStatusCode();
        $handler->handleMessage();
        $handler->handleErrors();
        return $this->error($handler->getErrors(), $handler->getMessage(), $handler->getStatusCode());
    }
}
