<?php

return [
    "Symfony\Component\HttpKernel\Exception\NotFoundHttpException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\NotFoundException",
    "ErrorException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ServerInternalException",
    "Illuminate\Database\QueryException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ServerInternalException",
    "Illuminate\Auth\AuthenticationException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\UnauthenticatedException",
    "Symfony\Component\HttpKernel\Exception\HttpException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\AccessDeniedException",
    "Illuminate\Validation\ValidationException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ValidationException",
    "Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException"=>"\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\NotFoundException",
];
