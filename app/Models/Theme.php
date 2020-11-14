<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $table = "themes";
    protected $fillable = [
        'name',
        'category_id',
        'min_pax',
        'max_pax',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'price'
    ];
}
