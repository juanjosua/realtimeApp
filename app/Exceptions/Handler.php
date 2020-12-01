<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        // $this->reportable(function (Throwable $e) {
        //     //
        // });

        $this->renderable(function (JWTException $e, $request)
        {
            // if ($e instanceof TokenBlacklistedException) {
            //   return response(['error' => 'The token has been blacklisted'], 400);
            // } elseif ($e instanceof TokenInvalidException) {
            //   return response(['error' => 'The token is invalid'], 400);
            // } elseif ($e instanceof TokenExpiredException) {
            //   return response(['error' => 'The token is expired'], 400);
            // } else {
            //   return response(['error' => 'The token could not be parsed from the request'], 400);
            // }

            return response($e->getMessage());
        });
    }
}
