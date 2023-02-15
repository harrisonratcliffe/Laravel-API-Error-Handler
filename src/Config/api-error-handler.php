<?php

return [
    /**
     * NotFoundException
     */
    "Symfony\Component\HttpKernel\Exception\NotFoundHttpException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\NotFoundException",
    "Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\NotFoundException",

    /**
     * ServerInternalException
     */
    "ErrorException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ServerInternalException",
    "Illuminate\Database\QueryException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ServerInternalException",

    /**
     * AuthenticationException
     */
    "Illuminate\Auth\AuthenticationException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\AuthenticationException",

    /**
     * AccessDeniedException
     */
    "Symfony\Component\HttpKernel\Exception\HttpException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\AccessDeniedException",
    "Illuminate\Auth\Access\AuthorizationException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\AccessDeniedException",

    /**
     * ValidationException
     */
    "Illuminate\Validation\ValidationException" => "\harrisonratcliffe\LaravelApiErrorHandler\Exceptions\ValidationException",
];
