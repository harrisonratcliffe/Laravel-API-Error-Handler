<?php


namespace harrisonratcliffe\LaravelApiErrorHandler\Exceptions;


class ServerInternalException extends ExceptionAbstract
{

    public function handleStatusCode():void
    {
        $this->statusCode = 500;
    }

    public function handleMessage():void
    {
        $this->message = "The server encountered an error and could not complete your request.";
    }

    public function handleErrors():void
    {
        $this->errors = '';
    }

}
