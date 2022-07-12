<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesData extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'properties_data';

    protected $fillable = [
        'items_id',
        'key',
        'item_code',
        'value'
    ];
}
