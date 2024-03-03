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
    // TODO::owner/loginからログインして、メニューをクリックすると/loginに飛ばされる　RedirectIfAuthenticatedで認証状態OKの分岐に入れていない。渡す値が悪いのか引数の置き方が悪いのか、ほかの原因なのか調査中
    protected function unauthenticated($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/admin/login');
        }

        return redirect()->guest($exception->redirectTo ?? route('login'));
    }
}
