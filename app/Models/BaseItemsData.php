<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseItemsData extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'base_items_data';

    protected $fillable = [
        'unique_items_id',
        'key',
        'code',
        'value'
    ];
}
