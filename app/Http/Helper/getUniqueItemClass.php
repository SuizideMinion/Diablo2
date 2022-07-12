<?php
namespace App\Http\Controllers;

use App\Models\UniqueItems;
use App\Models\UniqueItemsData;

Class getUniqueItem
{
    public $index;//
    public $lvl;//
    public $lvlreq;//
    public $code;//
    public $type;
    public $btype;
    public $invfile;

    public function __construct($id)
    {
        $Unique = UniqueItems::where('id', $id)->firstOrFail();

        $this->index = UniqueItemsData::where('item_id', $Unique->id)->where('key', 'index')->first()->value;
        $this->lvl = UniqueItemsData::where('item_id', $Unique->id)->where('key', 'lvl')->first()->value;
        $this->lvlreq = UniqueItemsData::where('item_id', $Unique->id)->where('key', 'lvl req')->first()->value;
        $this->code = UniqueItemsData::where('item_id', $Unique->id)->where('key', 'code')->first()->value;
        $this->type = $Unique->type;
        $this->btype = $Unique->btype;
        $this->invfile = (UniqueItemsData::where('item_id', $Unique->id)->where('key', 'invfile')->first() != false ?
            UniqueItemsData::where('item_id', $Unique->id)->where('key', 'invfile')->first()->value:false);

        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop1")->first();
        if(isset($try)){
            $this->prop1 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par1")->first();
            $this->par1 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min1")->first();
            $this->min1 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max1")->first();
            $this->max1 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop2")->first();
        if(isset($try)){
            $this->prop2 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par2")->first();
            $this->par2 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min2")->first();
            $this->min2 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max2")->first();
            $this->max2 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop3")->first();
        if(isset($try)){
            $this->prop3 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par3")->first();
            $this->par3 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min3")->first();
            $this->min3 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max3")->first();
            $this->max3 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop4")->first();
        if(isset($try)){
            $this->prop4 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par4")->first();
            $this->par4 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min4")->first();
            $this->min4 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max4")->first();
            $this->max4 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop5")->first();
        if(isset($try)){
            $this->prop5 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par5")->first();
            $this->par5 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min5")->first();
            $this->min5 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max5")->first();
            $this->max5 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop6")->first();
        if(isset($try)){
            $this->prop6 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par6")->first();
            $this->par6 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min6")->first();
            $this->min6 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max6")->first();
            $this->max6 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop7")->first();
        if(isset($try)){
            $this->prop7 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par7")->first();
            $this->par7 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min7")->first();
            $this->min7 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max7")->first();
            $this->max7 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop8")->first();
        if(isset($try)){
            $this->prop8 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par8")->first();
            $this->par8 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min8")->first();
            $this->min8 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max8")->first();
            $this->max8 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop9")->first();
        if(isset($try)){
            $this->prop9 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par9")->first();
            $this->par9 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min9")->first();
            $this->min9 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max9")->first();
            $this->max9 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop10")->first();
        if(isset($try)){
            $this->prop10 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par10")->first();
            $this->par10 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min10")->first();
            $this->min10 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max10")->first();
            $this->max10 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop11")->first();
        if(isset($try)){
            $this->prop11 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par11")->first();
            $this->par11 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min11")->first();
            $this->min11 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max11")->first();
            $this->max11 = ( isset($try->value) ? $try->value : 0);
        }
        $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "prop12")->first();
        if(isset($try)){
            $this->prop12 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "par12")->first();
            $this->par12 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "min12")->first();
            $this->min12 = ( isset($try->value) ? $try->value : 0);
            $try = UniqueItemsData::where("item_id", $Unique->id)->where("key", "max12")->first();
            $this->max12 = ( isset($try->value) ? $try->value : 0);
        }
    }
}

?>
