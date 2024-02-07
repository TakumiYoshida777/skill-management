<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * プロジェクトで使用しているフレームワークを取得
     *
     * @return HasMany
     */
    public function database(): HasMany
    {
        return $this->hasMany(ProjectUsedDatabase::class);
    }

    /**
     * プロジェクトで使用しているフレームワークを取得
     *
     * @return HasMany
     */
    public function framework(): HasMany
    {
        return $this->hasMany(ProjectUsedFramework::class);
    }

    /**
     * プロジェクトで使用しているプログラミング言語を取得
     *
     * @return HasMany
     */
    public function language(): HasMany
    {
        return $this->hasMany(ProjectUsedLanguage::class);
    }

    /**
     * プロジェクトで使用しているミドルウェアを取得
     *
     * @return HasMany
     */
    public function middleware(): HasMany
    {
        return $this->hasMany(ProjectUsedMiddleware::class);
    }

    /**
     * プロジェクトで使用しているOSを取得
     *
     * @return HasMany
     */
    public function os(): HasMany
    {
        return $this->hasMany(ProjectUsedOs::class);
    }

    /**
     * プロジェクトで使用しているサーバーを取得
     *
     * @return HasMany
     */
    public function server(): HasMany
    {
        return $this->hasMany(ProjectUsedServer::class);
    }

    /**
     * プロジェクトで使用しているバージョン管理システムを取得
     *
     * @return HasMany
     */
    public function version_management(): HasMany
    {
        return $this->hasMany(ProjectUsedVersionManagement::class);
    }

    /**
     * プロジェクトで使用している仮想環境を取得
     *
     * @return HasMany
     */
    public function virtual_environment(): HasMany
    {
        return $this->hasMany(ProjectUsedVirtualEnvironment::class);
    }

    /**
     * プロジェクトを所有しているユーザーを取得
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'team_size',
        'all_team_size',
        'position',
        'requirement_definition_flag',
        'basic_design_flag',
        'detailed_design_flag',
        'db_design_flag',
        'programming_flag',
        'unit_testing_flag',
        'integration_testing_flag',
        'system_testing_flag',
        'operation_testing_flag',
        'system_migration_flag',
        'operation_maintenance_flag',
    ];
}
