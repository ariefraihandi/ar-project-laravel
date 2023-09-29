<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSubsChild extends Model
{
    use HasFactory;

    protected $table = 'menus_subs_child'; // Nama tabel yang sesuai
    protected $fillable = [
        'id_submenu',
        'title',
        'url',
        'is_active',
    ];

    // Tambahan kode model lainnya jika diperlukan
}
