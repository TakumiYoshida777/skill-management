<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * ロール情報の取得
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * ユーザーの使用できるデータベースを取得
     *
     * @return HasMany
     */
    public function database(): HasMany
    {
        return $this->hasMany(EngineerSkillDatabase::class);
    }

    /**
     * ユーザーの使用できるフレームワークを取得
     *
     * @return HasMany
     */
    public function framework(): HasMany
    {
        return $this->hasMany(EngineerSkillFramework::class);
    }

    /**
     * ユーザーの使用できるプログラミング言語を取得
     *
     * @return HasMany
     */
    public function language(): HasMany
    {
        return $this->hasMany(EngineerSkillLanguage::class);
    }

    /**
     * ユーザーの使用できるミドルウェアを取得
     *
     * @return HasMany
     */
    public function middleware(): HasMany
    {
        return $this->hasMany(EngineerSkillMiddleware::class);
    }

    /**
     * ユーザーの使用できるOSを取得
     *
     * @return HasMany
     */
    public function os(): HasMany
    {
        return $this->hasMany(EngineerSkillOs::class);
    }

    /**
     * ユーザーの使用できるサーバーを取得
     *
     * @return HasMany
     */
    public function server(): HasMany
    {
        return $this->hasMany(EngineerSkillServer::class);
    }

    /**
     * ユーザーの使用できる仮想環境を取得
     *
     * @return HasMany
     */
    public function virtual_environment(): HasMany
    {
        return $this->hasMany(EngineerSkillVirtualEnvironment::class);
    }

    /**
     * ユーザーの使用できるバージョン管理システムを取得
     *
     * @return HasMany
     */
    public function version_management(): HasMany
    {
        return $this->hasMany(EngineerSkillVersionManagement::class);
    }

    /**
     * ユーザーの使用できる外国語を取得
     *
     * @return HasMany
     */
    public function language_proficiency(): HasMany
    {
        return $this->hasMany(LanguageProficiency::class);
    }

    /**
     * ユーザーのポートフォリオを取得
     *
     * @return HasMany
     */
    public function portfolio(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * ユーザーのプロフィールを取得
     *
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
    /**
     * ユーザーのプロジェクトを取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * ユーザーの資格を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualification(): HasMany
    {
        return $this->hasMany(Qualification::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'first_name_kana',
        'last_name',
        'last_name_kana',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'id' => 'string'
    ];
}
