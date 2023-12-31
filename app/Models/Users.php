<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait; // Tambahkan import untuk Authenticatable

class Users extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait; // Tambahkan AuthenticableTrait ke penggunaan trait

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'activated_at',
        'password',
        'username',
        'role_id', // Remove the space
    ];
    

    // Relasi dengan UserProfile
    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    // Relasi dengan File
    public function files()
    {
        return $this->hasMany(File::class, 'id_user');
    }

    public function role()
    {
        return $this->belongsTo(UsersRole::class, 'role_id');
    }
}
