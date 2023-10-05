<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makalah extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'url', 'harga'];

    // Jika Anda ingin mengizinkan mass assignment untuk kolom lain, tambahkan mereka di sini.
}
