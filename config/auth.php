<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 認証デフォルト
    |--------------------------------------------------------------------------
    |
    | このオプションは、アプリケーションのデフォルトの認証「ガード」とパスワード
    | リセットオプションを制御します。必要に応じてこれらのデフォルトを変更できます
    | が、ほとんどのアプリケーションには最適な開始点です。
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | 認証ガード
    |--------------------------------------------------------------------------
    |
    | 次に、アプリケーションの各認証ガードを定義できます。
    | もちろん、ここにはセッションストレージとEloquentユーザープロバイダーを使用する
    | 素晴らしいデフォルト構成が定義されています。
    |
    | すべての認証ドライバーにはユーザープロバイダーがあります。これにより、
    | ユーザーが実際にデータベースやその他のストレージから取得される方法が定義されます
    | このアプリケーションでユーザーのデータを永続化するために使用されるメカニズム。
    |
    | サポートされている: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        // 'admin' => [
        //     'driver' => 'session',
        //     'provider' => 'admins',
        // ],
        // 'owner' => [
        //     'driver' => 'session',
        //     'provider' => 'owners',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | ユーザープロバイダー
    |--------------------------------------------------------------------------
    |
    | すべての認証ドライバーにはユーザープロバイダーがあります。これにより、
    | ユーザーが実際にデータベースやその他のストレージから取得される方法が定義されます。
    |
    | 複数のユーザーテーブルやモデルがある場合は、複数の構成を行うことができます
    | 各モデル/テーブルを表すソース。これらのソースは、定義した追加の認証ガードに割り当てることができます。
    |
    | サポートされている: "database", "eloquent"
    |
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,

        ],
        // 'admins' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\Admin::class,

        // ],
        // 'owners' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\Owner::class,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | パスワードリセット
    |--------------------------------------------------------------------------
    |
    | アプリケーションに複数のユーザーテーブルやモデルがある場合、複数の
    | 特定のユーザータイプに基づいた別々のパスワードリセット設定を持ちたい場合があります。
    |
    | 有効期限は、各リセットトークンが考慮される分数です
    | 有効です。このセキュリティ機能により、トークンは短命に保たれるため
    | 推測される時間が少なくなります。必要に応じてこれを変更できます。
    |
    | スロットル設定は、ユーザーが待機する必要がある秒数です
    | より多くのパスワードリセットトークンを生成します。これにより、ユーザーが
    | 非常に多くのパスワードリセットトークンを迅速に生成するのを防ぎます。
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | パスワード確認タイムアウト
    |--------------------------------------------------------------------------
    |
    | ここでは、パスワード確認がタイムアウトし、ユーザーが
    | 確認画面を介してパスワードを再入力するまでの秒数を定義できます。デフォルトでは、タイムアウトは3時間です。
    |
    */

    'password_timeout' => 10800,

];
