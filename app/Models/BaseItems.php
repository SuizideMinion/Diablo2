<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseItems extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'base_items';

    protected $fillable = [
        'name',
        'code',
        'type',
        'btype'
    ];

    public function getInvFile($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "invfile")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getName($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "code")->first();
        if ( isset($value->value) ) {
            $String = Strings::where('key', $value->value)->first();
            if ( isset($String->value) ) return $String->value;
            else {
                $String = Strings::where('key', 'dummy')->first();
                return $String->value;
            }
        }
        else return false;
    }
    public function getOneHandDamage($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "mindam")->first();
        $maxdam = BaseItemsData::where("item_id", $id)->where("key", "maxdam")->first();
        if ( isset($value->value) ) return array($value->value, $maxdam->value);
        else return false;
    }
    public function getTwoHandDamage($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "2handmindam")->first();
        $maxdam = BaseItemsData::where("item_id", $id)->where("key", "2handmaxdam")->first();
        if ( isset($value->value) ) return array($value->value, $maxdam->value);
        else return false;
    }
    public function getTrowHandDamage($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "minmisdam")->first();
        $maxdam = BaseItemsData::where("item_id", $id)->where("key", "maxmisdam")->first();
        if ( isset($value->value) ) return array($value->value, $maxdam->value);
        else return false;
    }
    public function getDefensive($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "minac")->first();
        $maxdef = BaseItemsData::where("item_id", $id)->where("key", "maxac")->first();
        if ( isset($value->value) ) return array($value->value, $maxdef->value);
        else return false;
    }
    public function getSpeed($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "speed")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    //TODO:: get String hat 11 verschiedene einträge aber nur 7 Strings?
//    public function getSpeedString($id) {
//        $value = BaseItemsData::where("item_id", $id)->where("key", "speed")->first();
//        $getUpdate = Update::where('key', 'weaponBaseSpeedString'. ( isset($value->value) ? $value->value : '0'))->first();
//        $String = Strings::where('key', $getUpdate->value)->first();
//        if ( isset($String->value) ) return $String->value;
//        else return false;
//    }
    public function getBaseType($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "baseType")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getType($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "type")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getBlock($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "block")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getLevel($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "level")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getRange($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "rangeadder")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getStrReq($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "reqstr")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getDexReq($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "reqdex")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getSockets($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "gemsockets")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getLevelReq($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "levelreq")->first();
        if ( isset($value->value) ) return $value->value;
        else return false;
    }
    public function getItemLevel($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "code")->first();
        if ( !isset($value->value) ) return 0;
        $norm = BaseItemsData::where("item_id", $id)->where("key", "normcode")->first();
        $exept = BaseItemsData::where("item_id", $id)->where("key", "ubercode")->first();
        $elite = BaseItemsData::where("item_id", $id)->where("key", "ultracode")->first();
        if (isset($norm->value)) {
            if ( isset($norm->value) ) $level = ($value->value == $norm->value ? '1':'');
            if ( isset($exept->value) ) $level = ($value->value == $exept->value ? '2':$level);
            if ( isset($elite->value) ) $level = ($value->value == $elite->value ? '3':$level);
            $array = [$level, (isset($norm->value) ? $norm->value:''), (isset($exept->value) ? $exept->value:''), (isset($elite->value) ? $elite->value:'')];
            return $array;
        }
    }
    public function getDurability($id) {
        $value = BaseItemsData::where("item_id", $id)->where("key", "nodurability")->first();
        if(!isset($value)) {
            $dura = BaseItemsData::where("item_id", $id)->where("key", "durability")->first();
        }
        if ( isset($dura->value) ) return $dura->value;
        else return false;
    }
    public function Data($id){
        $Value = BaseItemsData::where('item_id', $this->id)->where('key', $id)->first();
        if(!$Value) return null;
        return $Value->value;
    }
}
