<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageProficiency extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * 使用できる外国語を所有しているユーザーを取得
     *
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 複数代入可能な属性
     *
     * @var array
     */
    protected $fillable = ['user_id','name','learning_method','total_date','read_status','write_status','conversation_status','memo'];
}
