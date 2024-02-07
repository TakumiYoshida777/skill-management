<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectUsedMiddleware extends Model
{
    use HasFactory;

    /**
     * ミドルウェアを使用しているプロジェクトを取得
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
