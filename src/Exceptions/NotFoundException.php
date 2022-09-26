<?php


namespace harrisonratcliffe\LaravelApiErrorHandler\Exceptions;


class NotFoundException extends ExceptionAbstract
{

    public function handleStatusCode():void
    {
        $this->statusCode = 404;
    }

    public function handleMessage():void
    {
        $this->message = "The requested resource could not be found.";
    }

    public function handleErrors():void
    {
        $this->errors = '';
    }
}
