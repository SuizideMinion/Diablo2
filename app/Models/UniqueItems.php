<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueItems extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'unique_items';

    protected $fillable = [
        'name',
        'code',
        'type',
        'btype',
    ];

    public function getName($id) {
        $value = UniqueItemsData::where("item_id", $id)->where("key", "name")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }

    public function Data($id){
        $Value = UniqueItemsData::where('item_id', $this->id)->where('key', $id)->first();
        if(!$Value) return null;
        return $Value->value;
    }
    public function Base($code,$type){
        $Value = \App\Models\BaseItems::where('base_items.code', $code)
            ->join('base_items_data', 'base_items.id', '=', 'base_items_data.item_id')
            ->where('base_items_data.key', $type)
            ->select('base_items_data.value')
            ->first();

        if(!$Value) return false;
        return $Value->value;
    }
    public function Properties($code){
//        $code = trim($code, '%');
        $Value = \App\Models\Properties::where('code', $code)
            ->join('properties_data', 'properties.id', '=', 'properties_data.item_id')
            ->where('properties_data.key', 'stat1')
            ->select('properties_data.value')
            ->first();
        if ($code == 'dmg-min') return $code = 'mindamage';
        if ($code == 'bloody') return $code = 'bloody';
        if ($code == 'dmg-max') return $code = 'maxdamage';
        if ($code == 'dmg%') return $code = 'dmg';
        if(!$Value) return 'error';
        $Value = \App\Models\ItemStatCost::where('item_stat_cost.code', $Value->value)
            ->join('item_stat_cost_data', 'item_stat_cost.id', '=', 'item_stat_cost_data.item_id')
            ->where('item_stat_cost_data.key', 'descstrpos')
            ->select('item_stat_cost_data.value')
            ->first();

        if(!$Value) return 'error2';
        $Value = \App\Models\Strings::where('key', $Value->value)->first();
        if(!$Value) return 'error3';
        return $Value->value;
    }
}
