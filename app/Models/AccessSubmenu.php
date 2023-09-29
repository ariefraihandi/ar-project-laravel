<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessSubmenu extends Model
{
    use HasFactory;

    protected $table = 'access_submenu'; // Adjust to your table name

    protected $fillable = [
        'role_id',
        'submenu_id',
        'created_at',
        'updated_at',
    ];
}
