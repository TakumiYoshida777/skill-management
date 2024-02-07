<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EngineerSkillVersionManagement extends Model
{
    use HasFactory;

    /**
     * バージョン管理システムスキルを所有しているユーザーを取得
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 複数代入可能な属性
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'experience_months'];
}
