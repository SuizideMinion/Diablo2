<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStatCostData extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'item_stat_cost_data';

    protected $fillable = [
        'items_id',
        'key',
        'item_code',
        'value'
    ];
}
