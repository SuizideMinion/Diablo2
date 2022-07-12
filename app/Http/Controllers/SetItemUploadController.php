<?php

namespace App\Http\Controllers;

use App\Models\SetItems;
use App\Models\SetItemsData;
use Illuminate\Http\Request;

class SetItemUploadController extends Controller
{
    public function index() {

        $path = storage_path() . "/json/setitems.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ( $jsons as $json ) {

            $item = new SetItems();
            $item->name = $json['index'];
            $item->code = $json['item'];
            $item->save();

            $item_id = $item->id;

            if(isset($json['index'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'name';
                $item_data->value = $json['index'];
                $item_data->save();
            }
            if(isset($json['item'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'code';
                $item_data->value = $json['item'];
                $item_data->save();
            }
            if(isset($json['set'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'set';
                $item_data->value = $json['set'];
                $item_data->save();
            }
            if(isset($json['*item'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = '*item';
                $item_data->value = $json['*item'];
                $item_data->save();
            }
            if(isset($json['rarity'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'rarity';
                $item_data->value = $json['rarity'];
                $item_data->save();
            }
            if(isset($json['lvl'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'lvl';
                $item_data->value = $json['lvl'];
                $item_data->save();
            }
            if(isset($json['lvl req'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'lvl req';
                $item_data->value = $json['lvl req'];
                $item_data->save();
            }
            if(isset($json['chrtransform'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'chrtransform';
                $item_data->value = $json['chrtransform'];
                $item_data->save();
            }
            if(isset($json['invtransform'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'invtransform';
                $item_data->value = $json['invtransform'];
                $item_data->save();
            }
            if(isset($json['invfile'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'invfile';
                $item_data->value = $json['invfile'];
                $item_data->save();
            }
            if(isset($json['flippyfile'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'flippyfile';
                $item_data->value = $json['flippyfile'];
                $item_data->save();
            }
            if(isset($json['dropsound'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'dropsound';
                $item_data->value = $json['dropsound'];
                $item_data->save();
            }
            if(isset($json['dropsfxframe'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'dropsfxframe';
                $item_data->value = $json['dropsfxframe'];
                $item_data->save();
            }
            if(isset($json['usesound'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'usesound';
                $item_data->value = $json['usesound'];
                $item_data->save();
            }
            if(isset($json['cost mult'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'cost mult';
                $item_data->value = $json['cost mult'];
                $item_data->save();
            }
            if(isset($json['cost add'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'cost add';
                $item_data->value = $json['cost add'];
                $item_data->save();
            }
            if(isset($json['add func'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'add func';
                $item_data->value = $json['add func'];
                $item_data->save();
            }
            if(isset($json['prop1'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop1';
                $item_data->value = $json['prop1'];
                $item_data->save();
            }
            if(isset($json['par1'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par1';
                $item_data->value = $json['par1'];
                $item_data->save();
            }
            if(isset($json['min1'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min1';
                $item_data->value = $json['min1'];
                $item_data->save();
            }
            if(isset($json['max1'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max1';
                $item_data->value = $json['max1'];
                $item_data->save();
            }
            if(isset($json['prop2'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop2';
                $item_data->value = $json['prop2'];
                $item_data->save();
            }
            if(isset($json['par2'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par2';
                $item_data->value = $json['par2'];
                $item_data->save();
            }
            if(isset($json['min2'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min2';
                $item_data->value = $json['min2'];
                $item_data->save();
            }
            if(isset($json['max2'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max2';
                $item_data->value = $json['max2'];
                $item_data->save();
            }
            if(isset($json['prop3'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop3';
                $item_data->value = $json['prop3'];
                $item_data->save();
            }
            if(isset($json['par3'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par3';
                $item_data->value = $json['par3'];
                $item_data->save();
            }
            if(isset($json['min3'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min3';
                $item_data->value = $json['min3'];
                $item_data->save();
            }
            if(isset($json['max3'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max3';
                $item_data->value = $json['max3'];
                $item_data->save();
            }
            if(isset($json['prop4'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop4';
                $item_data->value = $json['prop4'];
                $item_data->save();
            }
            if(isset($json['par4'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par4';
                $item_data->value = $json['par4'];
                $item_data->save();
            }
            if(isset($json['min4'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min4';
                $item_data->value = $json['min4'];
                $item_data->save();
            }
            if(isset($json['max4'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max4';
                $item_data->value = $json['max4'];
                $item_data->save();
            }
            if(isset($json['prop5'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop5';
                $item_data->value = $json['prop5'];
                $item_data->save();
            }
            if(isset($json['par5'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par5';
                $item_data->value = $json['par5'];
                $item_data->save();
            }
            if(isset($json['min5'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min5';
                $item_data->value = $json['min5'];
                $item_data->save();
            }
            if(isset($json['max5'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max5';
                $item_data->value = $json['max5'];
                $item_data->save();
            }
            if(isset($json['prop6'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop6';
                $item_data->value = $json['prop6'];
                $item_data->save();
            }
            if(isset($json['par6'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par6';
                $item_data->value = $json['par6'];
                $item_data->save();
            }
            if(isset($json['min6'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min6';
                $item_data->value = $json['min6'];
                $item_data->save();
            }
            if(isset($json['max6'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max6';
                $item_data->value = $json['max6'];
                $item_data->save();
            }
            if(isset($json['prop7'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop7';
                $item_data->value = $json['prop7'];
                $item_data->save();
            }
            if(isset($json['par7'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par7';
                $item_data->value = $json['par7'];
                $item_data->save();
            }
            if(isset($json['min7'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min7';
                $item_data->value = $json['min7'];
                $item_data->save();
            }
            if(isset($json['max7'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max7';
                $item_data->value = $json['max7'];
                $item_data->save();
            }
            if(isset($json['prop8'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop8';
                $item_data->value = $json['prop8'];
                $item_data->save();
            }
            if(isset($json['par8'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par8';
                $item_data->value = $json['par8'];
                $item_data->save();
            }
            if(isset($json['min8'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min8';
                $item_data->value = $json['min8'];
                $item_data->save();
            }
            if(isset($json['max8'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max8';
                $item_data->value = $json['max8'];
                $item_data->save();
            }
            if(isset($json['prop9'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prop9';
                $item_data->value = $json['prop9'];
                $item_data->save();
            }
            if(isset($json['par9'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'par9';
                $item_data->value = $json['par9'];
                $item_data->save();
            }
            if(isset($json['min9'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'min9';
                $item_data->value = $json['min9'];
                $item_data->save();
            }
            if(isset($json['max9'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'max9';
                $item_data->value = $json['max9'];
                $item_data->save();
            }
            if(isset($json['aprop1a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop1a';
                $item_data->value = $json['aprop1a'];
                $item_data->save();
            }
            if(isset($json['apar1a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar1a';
                $item_data->value = $json['apar1a'];
                $item_data->save();
            }
            if(isset($json['amin1a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin1a';
                $item_data->value = $json['amin1a'];
                $item_data->save();
            }
            if(isset($json['amax1a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax1a';
                $item_data->value = $json['amax1a'];
                $item_data->save();
            }
            if(isset($json['aprop1b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop1b';
                $item_data->value = $json['aprop1b'];
                $item_data->save();
            }
            if(isset($json['apar1b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar1b';
                $item_data->value = $json['apar1b'];
                $item_data->save();
            }
            if(isset($json['amin1b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin1b';
                $item_data->value = $json['amin1b'];
                $item_data->save();
            }
            if(isset($json['amax1b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax1b';
                $item_data->value = $json['amax1b'];
                $item_data->save();
            }
            if(isset($json['aprop2a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop2a';
                $item_data->value = $json['aprop2a'];
                $item_data->save();
            }
            if(isset($json['apar2a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar2a';
                $item_data->value = $json['apar2a'];
                $item_data->save();
            }
            if(isset($json['amin2a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin2a';
                $item_data->value = $json['amin2a'];
                $item_data->save();
            }
            if(isset($json['amax2a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax2a';
                $item_data->value = $json['amax2a'];
                $item_data->save();
            }
            if(isset($json['aprop2b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop2b';
                $item_data->value = $json['aprop2b'];
                $item_data->save();
            }
            if(isset($json['apar2b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar2b';
                $item_data->value = $json['apar2b'];
                $item_data->save();
            }
            if(isset($json['amin2b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin2b';
                $item_data->value = $json['amin2b'];
                $item_data->save();
            }
            if(isset($json['amax2b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax2b';
                $item_data->value = $json['amax2b'];
                $item_data->save();
            }
            if(isset($json['aprop3a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop3a';
                $item_data->value = $json['aprop3a'];
                $item_data->save();
            }
            if(isset($json['apar3a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar3a';
                $item_data->value = $json['apar3a'];
                $item_data->save();
            }
            if(isset($json['amin3a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin3a';
                $item_data->value = $json['amin3a'];
                $item_data->save();
            }
            if(isset($json['amax3a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax3a';
                $item_data->value = $json['amax3a'];
                $item_data->save();
            }
            if(isset($json['aprop3b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop3b';
                $item_data->value = $json['aprop3b'];
                $item_data->save();
            }
            if(isset($json['apar3b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar3b';
                $item_data->value = $json['apar3b'];
                $item_data->save();
            }
            if(isset($json['amin3b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin3b';
                $item_data->value = $json['amin3b'];
                $item_data->save();
            }
            if(isset($json['amax3b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax3b';
                $item_data->value = $json['amax3b'];
                $item_data->save();
            }
            if(isset($json['aprop4a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop4a';
                $item_data->value = $json['aprop4a'];
                $item_data->save();
            }
            if(isset($json['apar4a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar4a';
                $item_data->value = $json['apar4a'];
                $item_data->save();
            }
            if(isset($json['amin4a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin4a';
                $item_data->value = $json['amin4a'];
                $item_data->save();
            }
            if(isset($json['amax4a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax4a';
                $item_data->value = $json['amax4a'];
                $item_data->save();
            }
            if(isset($json['aprop4b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop4b';
                $item_data->value = $json['aprop4b'];
                $item_data->save();
            }
            if(isset($json['apar4b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar4b';
                $item_data->value = $json['apar4b'];
                $item_data->save();
            }
            if(isset($json['amin4b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin4b';
                $item_data->value = $json['amin4b'];
                $item_data->save();
            }
            if(isset($json['amax4b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax4b';
                $item_data->value = $json['amax4b'];
                $item_data->save();
            }
            if(isset($json['aprop5a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop5a';
                $item_data->value = $json['aprop5a'];
                $item_data->save();
            }
            if(isset($json['apar5a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar5a';
                $item_data->value = $json['apar5a'];
                $item_data->save();
            }
            if(isset($json['amin5a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin5a';
                $item_data->value = $json['amin5a'];
                $item_data->save();
            }
            if(isset($json['amax5a'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax5a';
                $item_data->value = $json['amax5a'];
                $item_data->save();
            }
            if(isset($json['aprop5b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'aprop5b';
                $item_data->value = $json['aprop5b'];
                $item_data->save();
            }
            if(isset($json['apar5b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'apar5b';
                $item_data->value = $json['apar5b'];
                $item_data->save();
            }
            if(isset($json['amin5b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amin5b';
                $item_data->value = $json['amin5b'];
                $item_data->save();
            }
            if(isset($json['amax5b'])) {
                $item_data = new SetItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'amax5b';
                $item_data->value = $json['amax5b'];
                $item_data->save();
            }
        }

        return view('itemviewer.upload');
//        dd('saved');

    }
}
