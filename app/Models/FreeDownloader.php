<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; // Tambahkan ini

class FreeDownloader extends Model
{
    use HasFactory, Notifiable; // Tambahkan Notifiable di sini

    protected $table = 'free_downloader';

    protected $fillable = [
        'email',
        'file1',
        'file2',
        'file3',
        'id_makalah',
        'status',
    ];

    // Define any relationships or additional methods here

    // Tambahkan metode routeNotificationForMail
    public function routeNotificationForMail()
    {
        return $this->email;
    }
}
