<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianMakalah extends Model
{
    use HasFactory;

    protected $table = 'pembelian_makalah';
    protected $fillable = ['id_makalah', 'judul_makalah', 'format', 'harga', 'email', 'nomor_hp', 'status', 'token'];
}
