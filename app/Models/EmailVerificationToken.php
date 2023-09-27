<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerificationToken extends Model
{
    use HasFactory;

    protected $table = 'email_verification_tokens';

    protected $fillable = [
        'user_id',
        'token',
        'expires_at',
    ];
}
