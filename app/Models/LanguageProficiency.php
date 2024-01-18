<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageProficiency extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string'
    ];

    /**
     * 複数代入可能な属性
     *
     * @var array
     */
    protected $fillable = ['user_id','name','learning_method','total_date','read_status','write_status','conversation_status','memo'];
}
