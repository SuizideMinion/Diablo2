<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetItems extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'set_items';

    protected $fillable = [
        'name',
        'code'
    ];
}
