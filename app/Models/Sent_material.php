<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sent_material extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'tags',
        'users_id'
    ];
}
