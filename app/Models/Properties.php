<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'properties';

    protected $fillable = [
        'code'
    ];
}
