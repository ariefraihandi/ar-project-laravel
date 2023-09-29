<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus'; // Adjust to your table name

    protected $fillable = ['menu_name', 'order', 'created_at', 'updated_at']; // Include 'order' in the fillable array
}