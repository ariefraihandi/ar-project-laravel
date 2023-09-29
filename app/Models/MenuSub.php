<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSub extends Model
{
    use HasFactory;

    protected $table = 'menus_sub'; // Nama tabel yang sesuai
    protected $fillable = [
        'menu_id',
        'title',
        'order',
        'url',
        'icon',
        'itemsub',
        'is_active',
    ];

    // Jika Anda ingin mengatur relasi dengan model Menu, Anda dapat menambahkan relasi seperti ini:
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
