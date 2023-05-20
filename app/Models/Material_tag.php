<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material_tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'approved_ms_id',
        'tags_id'
    ];
}
