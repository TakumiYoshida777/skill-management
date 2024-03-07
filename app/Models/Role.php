<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * このロールに属する管理者を取得
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * このロールに属する管理者を取得
     */
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
}
