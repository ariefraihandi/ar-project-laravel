<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; // Pastikan Anda mengimpor Notifiable

class SocialData extends Model
{
    use Notifiable; // Gunakan Notifiable trait

    protected $table = 'social_data';

    protected $fillable = [
        'instagram_username',
        'email',
        'file1_path',
        'file2_path',
        'file3_path',
        'id_makalah',
        'token',
    ];

    public function routeNotificationForMail()
    {
        return $this->email;
    }
}

