<?php
namespace App\Http\Controllers;

use App\Models\BaseItems;
use App\Models\BaseItemsData;
use App\Models\Update;

Class getBaseItem
{
    public $item_id;
    public $code;
    public $name;
    public $invfile;
    public $baseitem;
    public $oneHandDamagemin;
    public $oneHandDamagemax;
    public $twoHandDamagemin;
    public $twoHandDamagemax;
    public $trowHandDamagemin;
    public $trowHandDamagemax;
    public $speed;
    public $durability;
    public $levelreq;
    public $level;
    public $range;
    public $strReq;
    public $dexReq;
    public $sockets;
    public $itemLevel;
    public $defensivemin;
    public $defensivemax;
    public $block;
    public $type;
    public $baseType;
    public $speedString;

    public function __construct($id)
    {
        if(is_numeric($id)) $base = BaseItems::where('id', $id)->firstOrFail();
        else {
            $base = BaseItems::where('code', $id)->firstOrFail();
            $id = $base->id;
        }
        $this->item_id = $id;
        $this->name = $base->getName($id);
        $this->code = $base->code;
        $this->invfile = ( Update::where('code', $base->code)->where('key', 'invfile')->first() != false ? Update::where('code', $base->code)->where('key', 'invfile')->first()->value : $base->getInvFile($id));
        $this->speed = $base->getSpeed($id);
//        $this->speedString = $base->getSpeedString($id); //TODO:: siehe BaseItems Model
        $this->durability = $base->getDurability($id);
        $this->levelreq = $base->getLevelReq($id);
        $this->level = $base->getLevel($id);
        $this->range = $base->getRange($id);
        $this->strReq = $base->getStrReq($id);
        $this->dexReq = $base->getDexReq($id);
        $this->sockets = $base->getSockets($id);
        $itemLevel = $base->getItemLevel($id);
        if( isset($itemLevel) )
        {
            $this->itemLevel = $itemLevel[0];
            $this->itemLevelN = $itemLevel[1];
            $this->itemLevelA = $itemLevel[2];
            $this->itemLevelH = $itemLevel[3];
        } else {
            $this->itemLevel = 0;
//            $this->itemLevelN = $base->code;
        }
        $this->block = $base->getBlock($id);
        $this->type = ( $base->getType($id) == 'h2h' ? 'h2h2' : $base->getType($id) );//$base->getType($id);
        $this->baseType = $base->getBaseType($id);

        // Get OneHand Damage
        if($base->getOneHandDamage($base->id) != false)
        {
            $this->oneHandDamagemin = $base->getOneHandDamage($base->id)[0];
            $this->oneHandDamagemax = $base->getOneHandDamage($base->id)[1];
        }

        // Get TwoHand Damage
        if($base->getTwoHandDamage($base->id) != false)
        {
            $this->twoHandDamagemin = $base->getTwoHandDamage($base->id)[0];
            $this->twoHandDamagemax = $base->getTwoHandDamage($base->id)[1];
        }
        if($base->getTrowHandDamage($base->id) != false)
        {
            $this->trowHandDamagemin = $base->getTrowHandDamage($base->id)[0];
            $this->trowHandDamagemax = $base->getTrowHandDamage($base->id)[1];
        }

        // Get Devensive
        if($base->getDefensive($base->id) != false)
        {
            $this->defensivemin = $base->getDefensive($base->id)[0];
            $this->defensivemax = $base->getDefensive($base->id)[1];
        }
        $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod1Code")->first();
        if($try != false)
        {
            if(isset($try)){
                $this->weaponMod1Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod1Param")->first();
                $this->weaponMod1Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod1Min")->first();
                $this->weaponMod1Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod1Max")->first();
                $this->weaponMod1Max = ( isset($try->value) ? $try->value : 0);
            }
            $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod2Code")->first();
            if(isset($try)){
                $this->weaponMod2Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod2Param")->first();
                $this->weaponMod2Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod2Min")->first();
                $this->weaponMod2Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod2Max")->first();
                $this->weaponMod2Max = ( isset($try->value) ? $try->value : 0);
            }
            $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod3Code")->first();
            if(isset($try)){
                $this->weaponMod3Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod3Param")->first();
                $this->weaponMod3Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod3Min")->first();
                $this->weaponMod3Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "weaponMod3Max")->first();
                $this->weaponMod3Max = ( isset($try->value) ? $try->value : 0);
            }
            $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod1Code")->first();
            if(isset($try)){
                $this->helmMod1Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod1Param")->first();
                $this->helmMod1Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod1Min")->first();
                $this->helmMod1Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod1Max")->first();
                $this->helmMod1Max = ( isset($try->value) ? $try->value : 0);
            }
            $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod2Code")->first();
            if(isset($try)){
                $this->helmMod2Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod2Param")->first();
                $this->helmMod2Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod2Min")->first();
                $this->helmMod2Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod2Max")->first();
                $this->helmMod2Max = ( isset($try->value) ? $try->value : 0);
            }
            $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod3Code")->first();
            if(isset($try)){
                $this->helmMod3Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod3Param")->first();
                $this->helmMod3Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod3Min")->first();
                $this->helmMod3Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "helmMod3Max")->first();
                $this->helmMod3Max = ( isset($try->value) ? $try->value : 0);
            }
            $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod1Code")->first();
            if(isset($try)){
                $this->shieldMod1Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod1Param")->first();
                $this->shieldMod1Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod1Min")->first();
                $this->shieldMod1Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod1Max")->first();
                $this->shieldMod1Max = ( isset($try->value) ? $try->value : 0);
            }
            $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod2Code")->first();
            if(isset($try)){
                $this->shieldMod2Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod2Param")->first();
                $this->shieldMod2Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod2Min")->first();
                $this->shieldMod2Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod2Max")->first();
                $this->shieldMod2Max = ( isset($try->value) ? $try->value : 0);
            }
            $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod3Code")->first();
            if(isset($try)) {
                $this->shieldMod3Code = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod3Param")->first();
                $this->shieldMod3Param = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod3Min")->first();
                $this->shieldMod3Min = ( isset($try->value) ? $try->value : 0);
                $try = BaseItemsData::where("item_id", $id)->where("key", "shieldMod3Max")->first();
                $this->shieldMod3Max = ( isset($try->value) ? $try->value : 0);
            }
        }
    }
}

?>
