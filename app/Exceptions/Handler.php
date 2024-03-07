<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * 認証してない状態で認証が必要なページ（homeなど）にアクセスするとログインページに遷移する
     *
     * @param [type] $request
     * @param Throwable $exception
     * @return void
     */
    protected function unauthenticated($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }
        // if ($request->is('admin') || $request->is('admin/*')) {
        //     return redirect()->guest('/admin/login');
        // }

        return redirect()->guest($exception->redirectTo ?? route('login'));
    }
}
