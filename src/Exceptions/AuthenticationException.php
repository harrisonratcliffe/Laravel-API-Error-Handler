<?php


namespace harrisonratcliffe\LaravelApiErrorHandler\Exceptions;


class AuthenticationException extends ExceptionAbstract
{

    public function handleStatusCode():void
    {
        $this->statusCode = 401;
    }

    public function handleMessage():void
    {
        $this->message = "You are not authorized to perform this action.";
    }

    public function handleErrors():void
    {
        $this->errors = '';
    }

}
