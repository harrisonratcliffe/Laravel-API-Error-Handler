<?php


namespace harrisonratcliffe\laravelApiErrorHandler\Exceptions;


class UnauthorizedException extends ExceptionAbstract
{

    public function handleStatusCode(): void
    {
        $this->statusCode = 401;
    }

    public function handleMessage(): void
    {
        $this->message = "You are not authorized.";
    }

    public function handleErrors():void
    {
        $this->errors = '';
    }

}
