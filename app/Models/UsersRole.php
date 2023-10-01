<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{
    use HasFactory;

    protected $table = 'users_role'; // Nama tabel yang sesuai
    protected $fillable = [
        'role',
        'is_active',
    ];

    public function accesses()
    {
        return $this->hasMany(Access::class, 'role_id');
    }
}
