<?php


namespace harrisonratcliffe\LaravelApiErrorHandler\Exceptions;


class AccessDeniedException extends ExceptionAbstract
{

    public function handleStatusCode():void
    {
        $this->statusCode = 403;
    }

    public function handleMessage():void
    {
        $this->message = "You do no have permission to perform this action.";
    }

    public function handleErrors():void
    {
        $this->errors = '';
    }

}
