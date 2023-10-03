<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeDownloader extends Model
{
    use HasFactory;

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
}
