<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
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
        'username', // Added 'username'
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
}
