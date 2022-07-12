<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueItemsData extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'unique_items_data';

    protected $fillable = [
        'item_id',
        'key',
        'value'
    ];
}
