<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
    use HasFactory;

    protected $table = 'download_logs'; // Nama tabel yang sesuai dengan tabel yang Anda buat

    protected $fillable = [
        'download_token',
        'makalah_id',
        'url',
    ];

    // Tambahkan relasi jika diperlukan, misalnya relasi ke tabel makalahs
    public function makalah()
    {
        return $this->belongsTo(Makalah::class, 'makalah_id');
    }
}
