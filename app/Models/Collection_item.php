<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'collections_id',
        'approved_ms_id'
    ];
}
