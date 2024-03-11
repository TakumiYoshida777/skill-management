<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SkillsheetCreator</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    </head>
    <body class="d-flex justify-content-center align-items-center vh-100 ">
            @if (Route::has('login'))
                <div class="text-center d-flex flex-column">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary mb-2">ホーム</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary mb-2">ユーザーログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary mb-5">ユーザーアカウント登録</a>
                        @endif
                        @if (Str::contains(Request::url(), 'admin'))
                        <a href="{{ url('/admin/login') }}" class="btn btn-primary">管理者</a>
                        @endif
                    @endauth
                </div>
            @endif
    </body>
</html>
