<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = ['menu_name', 'created_at', 'updated_at'];
}
