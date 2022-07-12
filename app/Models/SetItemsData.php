<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetItemsData extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'set_items_data';

    protected $fillable = [
        'items_id',
        'key',
        'value'
    ];
}
