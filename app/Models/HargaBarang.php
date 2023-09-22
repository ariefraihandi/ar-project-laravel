<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaBarang extends Model
{
    use HasFactory;
      /**
     * fillable
     *
     * @var array
     */
    protected $table = 'barang';
    
     protected $fillable = [
        'kode_barang', 'nama_barang', 'harga_barang',
    ];

}
