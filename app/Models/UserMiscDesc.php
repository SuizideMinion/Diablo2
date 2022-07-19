<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMiscDesc extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_misc_id',
        'key',
        'value',
        'user_id'
    ];
}
