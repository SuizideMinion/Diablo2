<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strings extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'strings';

    protected $fillable = [
        'items_id',
        'key',
        'value'
    ];

    public function getString($code)
    {
        dd($this);
    }
}
