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
        $this->message = $this->exception->errors();
    }
}
