<?php


namespace harrisonratcliffe\LaravelApiErrorHandler\Exceptions;


class ValidationException extends ExceptionAbstract
{

    public function handleStatusCode():void
    {
        $this->statusCode = 422;
    }

    public function handleMessage():void
    {
        $this->message = 'The data you submitted was rejected by the server.';
    }

    public function handleErrors():void
    {
        $this->errors = $this->exception->errors();
    }
}
