<?php


namespace harrisonratcliffe\LaravelApiErrorHandler\Exceptions;


class DefaultException extends ExceptionAbstract
{

    public function handleStatusCode():void
    {
        $this->statusCode = method_exists($this->exception,'getStatusCode') ? $this->exception->getStatusCode() : 500;
    }

    public function handleMessage():void
    {
        $this->message = $this->exception->getMessage();
    }
}
