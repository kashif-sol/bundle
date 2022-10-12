<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterproduct extends Model
{
    use HasFactory;
    protected $table = 'master_product';
    protected $fillable = [
        'product_id', 'title',
    ];
}
