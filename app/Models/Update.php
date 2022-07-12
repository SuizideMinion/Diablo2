<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'updates';

    protected $fillable = [
        'item_id',
        'key',
        'value',
        'code',
        'type'
    ];
}
