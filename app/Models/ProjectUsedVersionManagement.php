<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectUsedVersionManagement extends Model
{
    use HasFactory;

    /**
     * バージョン管理システムを使用しているプロジェクトを取得
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    protected $fillable = [
        "project_id",
        "name"
    ];
}
