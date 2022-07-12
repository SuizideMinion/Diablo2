<?php

namespace App\Http\Controllers;

use App\Models\BaseItems;
use App\Models\BaseItemsData;
use App\Models\ItemStatCost;
use App\Models\ItemStatCostData;
use App\Models\Properties;
use App\Models\PropertiesData;
use App\Models\PropertiesString;
use App\Models\Skill;
use App\Models\Strings;
use App\Models\UniqueItems;
use App\Models\UniqueItemsData;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class BaseUploadController extends Controller
{
    public function index()
    {
        return view('itemviewer.upload');
    }

    public function properties()
    {

        Properties::where('id', '!=', 0)->delete();
        PropertiesData::where('id', '!=', 0)->delete();
        $path = storage_path() . "/json/properties.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ($jsons as $json) {
            $item = new Properties();
            $item->code = $json['code'];
            $item->save();

            $item_id = $item->id;
            foreach ($json as $key => $value) {
                $item_data = new PropertiesData();
                $item_data->item_id = $item_id;
                $item_data->item_code = $json['code'];
                $item_data->key = $key;
                $item_data->value = $value;
                $item_data->save();
            }
        }
        return view('itemviewer.upload');

    }

    public function itemStatCost()
    {

        ItemStatCost::where('id', '!=', 0)->delete();
        ItemStatCostData::where('id', '!=', 0)->delete();
        $path = storage_path() . "/json/itemstatcost.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ($jsons as $json) {
            $item = new ItemStatCost();
            $item->code = $json['Stat'];
            $item->save();

            $item_id = $item->id;
            foreach ($json as $key => $value) {
                $item_data = new ItemStatCostData();
                $item_data->item_id = $item_id;
                $item_data->item_code = $json['Stat'];
                $item_data->key = $key;
                $item_data->value = $value;
                $item_data->save();
            }
        }
        return view('itemviewer.upload');

    }

    public function unique()
    {

        UniqueItems::where('id', '!=', 0)->delete();
        UniqueItemsData::where('id', '!=', 0)->delete();
        $path = storage_path() . "/json/uniqueitems.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ($jsons as $json) {
            if (isset($json['enabled'])) {
                // das Create event
                $baseItem = BaseItems::where('code', $json['code'])->first();
                $item = new UniqueItems();
                $item->name = $json['index'];
                $item->code = $json['code'];
                $item->type = $baseItem->type;
                $item->btype = $baseItem->btype;
                $item->save();

                $item_id = $item->id;
                foreach ($json as $key => $value) {
                    $item_data = new UniqueItemsData();
                    $item_data->item_id = $item_id;
                    $item_data->key = $key;
                    $item_data->value = $value;
                    $item_data->save();
                }
            }
        }
        return view('itemviewer.upload');

    }
    public function strings() {

        $path = storage_path() . "/json/localestrings-eng.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ( $jsons as $key =>  $json ) {
            // das Create event

            $item = new Strings();
            $item->key = $key;
            $item->value = $json;
            $item->save();

        }
        return view('itemviewer.upload');

    }

    public function propertiesString()
    {

        PropertiesString::where('id', '!=', 0)->delete();
        $path = storage_path() . "/json/PropertiesStrings.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );
        foreach ($jsons as $json) {
            $item_data = new PropertiesString();
            $item_data->key = $json['key'];
            $item_data->stat = $json['stat'];
            $item_data->lang = $json['lang'];
            $item_data->value = $json['value'];
            $item_data->save();
        }
        return view('itemviewer.upload');

    }
    public function Skills()
    {

        Skill::where('id', '!=', 0)->delete();
        $path = storage_path() . "/json/skills.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ($jsons as $json) {

            foreach ($json as $key => $value) {
//                dd($json);
                $item = new Skill();
                $item->name = (isset($json['skilldesc']) ? $json['skilldesc']:'none');
                $item->orgin_id = $json['*Id'];
                $item->key = $key;
                $item->value = $value;
                $item->save();
            }
        }
        return view('itemviewer.upload');
    }
    public function SkillDesc()
    {

        $path = storage_path() . "/json/skilldesc.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ($jsons as $json) {

            foreach ($json as $key => $value) {
                if (isset($json['skilldesc']))
                {
                    $orgin_id = Skill::where('name', $json['skilldesc'])->where('key', '*Id')->first();
                    $item = new Skill();
                    $item->name = $json['skilldesc'];
                    $item->orgin_id = $orgin_id->value;
                    $item->key = $key;
                    $item->value = $value;
                    $item->save();
                }
            }
        }
        return view('itemviewer.upload');
    }

    public function base($id)
    {

        $path = storage_path() . "/json/" . $id . ".json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ($jsons as $json) {
            // das Create event

            $item = new BaseItems();
            $item->name = $json['name'];
            $item->code = $json['code'];
            $item->type = $id;
            $item->btype = $json['type'];
            $item->save();

            $item_id = $item->id;

            $item_data = new BaseItemsData();
            $item_data->item_id = $item_id;
            $item_data->key = 'basetype';
            $item_data->value = $id;
            $item_data->save();
            if (isset($json['name'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'name';
                $item_data->value = $json['name'];
                $item_data->save();
            }
            if (isset($json['code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'code';
                $item_data->value = $json['code'];
                $item_data->save();
            }
            if (isset($json['version'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'version';
                $item_data->value = $json['version'];
                $item_data->save();
            }
            if (isset($json['compactsave'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'compactsave';
                $item_data->value = $json['compactsave'];
                $item_data->save();
            }
            if (isset($json['rarity'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'rarity';
                $item_data->value = $json['rarity'];
                $item_data->save();
            }
            if (isset($json['spawnable'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'spawnable';
                $item_data->value = $json['spawnable'];
                $item_data->save();
            }
            if (isset($json['minac'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'minac';
                $item_data->value = $json['minac'];
                $item_data->save();
            }
            if (isset($json['maxac'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'maxac';
                $item_data->value = $json['maxac'];
                $item_data->save();
            }
            if (isset($json['absorbs'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'absorbs';
                $item_data->value = $json['absorbs'];
                $item_data->save();
            }
            if (isset($json['speed'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'speed';
                $item_data->value = $json['speed'];
                $item_data->save();
            }
            if (isset($json['reqstr'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'reqstr';
                $item_data->value = $json['reqstr'];
                $item_data->save();
            }
            if (isset($json['block'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'block';
                $item_data->value = $json['block'];
                $item_data->save();
            }
            if (isset($json['durability'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'durability';
                $item_data->value = $json['durability'];
                $item_data->save();
            }
            if (isset($json['nodurability'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'nodurability';
                $item_data->value = $json['nodurability'];
                $item_data->save();
            }
            if (isset($json['level'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'level';
                $item_data->value = $json['level'];
                $item_data->save();
            }
            if (isset($json['levelreq'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'levelreq';
                $item_data->value = $json['levelreq'];
                $item_data->save();
            }
            if (isset($json['cost'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'cost';
                $item_data->value = $json['cost'];
                $item_data->save();
            }
            if (isset($json['gamble'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'gamble';
                $item_data->value = $json['gamble'];
                $item_data->save();
            }
            if (isset($json['cost'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'cost';
                $item_data->value = $json['cost'];
                $item_data->save();
            }
            if (isset($json['namestr'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'namestr';
                $item_data->value = $json['namestr'];
                $item_data->save();
            }
            if (isset($json['magic'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'magic';
                $item_data->value = $json['magic'];
                $item_data->save();
            }
            if (isset($json['lvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'lvl';
                $item_data->value = $json['lvl'];
                $item_data->save();
            }
            if (isset($json['auto'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'auto';
                $item_data->value = $json['auto'];
                $item_data->save();
            }
            if (isset($json['prefix'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'prefix';
                $item_data->value = $json['prefix'];
                $item_data->save();
            }
            if (isset($json['alternategfx'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'alternategfx';
                $item_data->value = $json['alternategfx'];
                $item_data->save();
            }
            if (isset($json['OpenBetaGfx'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'OpenBetaGfx';
                $item_data->value = $json['OpenBetaGfx'];
                $item_data->save();
            }
            if (isset($json['normcode'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'normcode';
                $item_data->value = $json['normcode'];
                $item_data->save();
            }
            if (isset($json['ubercode'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'ubercode';
                $item_data->value = $json['ubercode'];
                $item_data->save();
            }
            if (isset($json['ultracode'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'ultracode';
                $item_data->value = $json['ultracode'];
                $item_data->save();
            }
            if (isset($json['spelloffset'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'spelloffset';
                $item_data->value = $json['spelloffset'];
                $item_data->save();
            }
            if (isset($json['component'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'component';
                $item_data->value = $json['component'];
                $item_data->save();
            }
            if (isset($json['invwidth'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'invwidth';
                $item_data->value = $json['invwidth'];
                $item_data->save();
            }
            if (isset($json['invheight'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'invheight';
                $item_data->value = $json['invheight'];
                $item_data->save();
            }
            if (isset($json['hasinv'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'hasinv';
                $item_data->value = $json['hasinv'];
                $item_data->save();
            }
            if (isset($json['gemsockets'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'gemsockets';
                $item_data->value = $json['gemsockets'];
                $item_data->save();
            }
            if (isset($json['gemapplytype'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'gemapplytype';
                $item_data->value = $json['gemapplytype'];
                $item_data->save();
            }
            if (isset($json['flippyfile'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'flippyfile';
                $item_data->value = $json['flippyfile'];
                $item_data->save();
            }
            if (isset($json['invfile'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'invfile';
                $item_data->value = $json['invfile'];
                $item_data->save();
            }
            if (isset($json['uniqueinvfile'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'uniqueinvfile';
                $item_data->value = $json['uniqueinvfile'];
                $item_data->save();
            }
            if (isset($json['setinvfile'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'setinvfile';
                $item_data->value = $json['setinvfile'];
                $item_data->save();
            }
            if (isset($json['rArm'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'rArm';
                $item_data->value = $json['rArm'];
                $item_data->save();
            }
            if (isset($json['lArm'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'lArm';
                $item_data->value = $json['lArm'];
                $item_data->save();
            }
            if (isset($json['Torso'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'Torso';
                $item_data->value = $json['Torso'];
                $item_data->save();
            }
            if (isset($json['Legs'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'Legs';
                $item_data->value = $json['Legs'];
                $item_data->save();
            }
            if (isset($json['rSPad'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'rSPad';
                $item_data->value = $json['rSPad'];
                $item_data->save();
            }
            if (isset($json['lSPad'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'lSPad';
                $item_data->value = $json['lSPad'];
                $item_data->save();
            }
            if (isset($json['useable'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'useable';
                $item_data->value = $json['useable'];
                $item_data->save();
            }
            if (isset($json['throwable'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'throwable';
                $item_data->value = $json['throwable'];
                $item_data->save();
            }
            if (isset($json['stackable'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'stackable';
                $item_data->value = $json['stackable'];
                $item_data->save();
            }
            if (isset($json['minstack'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'minstack';
                $item_data->value = $json['minstack'];
                $item_data->save();
            }
            if (isset($json['maxstack'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'maxstack';
                $item_data->value = $json['maxstack'];
                $item_data->save();
            }
            if (isset($json['type'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'type';
                $item_data->value = $json['type'];
                $item_data->save();
            }
            if (isset($json['type2'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'type2';
                $item_data->value = $json['type2'];
                $item_data->save();
            }
            if (isset($json['dropsound'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'dropsound';
                $item_data->value = $json['dropsound'];
                $item_data->save();
            }
            if (isset($json['dropsfxframe'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'dropsfxframe';
                $item_data->value = $json['dropsfxframe'];
                $item_data->save();
            }
            if (isset($json['usesound'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'usesound';
                $item_data->value = $json['usesound'];
                $item_data->save();
            }
            if (isset($json['unique'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'unique';
                $item_data->value = $json['unique'];
                $item_data->save();
            }
            if (isset($json['transparent'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'transparent';
                $item_data->value = $json['transparent'];
                $item_data->save();
            }
            if (isset($json['transtbl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'transtbl';
                $item_data->value = $json['transtbl'];
                $item_data->save();
            }
            if (isset($json['quivered'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'quivered';
                $item_data->value = $json['quivered'];
                $item_data->save();
            }
            if (isset($json['lightradius'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'lightradius';
                $item_data->value = $json['lightradius'];
                $item_data->save();
            }
            if (isset($json['belt'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'belt';
                $item_data->value = $json['belt'];
                $item_data->save();
            }
            if (isset($json['quest'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'quest';
                $item_data->value = $json['quest'];
                $item_data->save();
            }
            if (isset($json['missiletype'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'missiletype';
                $item_data->value = $json['missiletype'];
                $item_data->save();
            }
            if (isset($json['durwarning'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'durwarning';
                $item_data->value = $json['durwarning'];
                $item_data->save();
            }
            if (isset($json['qntwarning'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'qntwarning';
                $item_data->value = $json['qntwarning'];
                $item_data->save();
            }
            if (isset($json['mindam'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'mindam';
                $item_data->value = $json['mindam'];
                $item_data->save();
            }
            if (isset($json['maxdam'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'maxdam';
                $item_data->value = $json['maxdam'];
                $item_data->save();
            }
            if (isset($json['StrBonus'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'StrBonus';
                $item_data->value = $json['StrBonus'];
                $item_data->save();
            }
            if (isset($json['DexBonus'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DexBonus';
                $item_data->value = $json['DexBonus'];
                $item_data->save();
            }
            if (isset($json['gemoffset'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'gemoffset';
                $item_data->value = $json['gemoffset'];
                $item_data->save();
            }
            if (isset($json['bitfield1'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'bitfield1';
                $item_data->value = $json['bitfield1'];
                $item_data->save();
            }
            if (isset($json['CharsiMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CharsiMin';
                $item_data->value = $json['CharsiMin'];
                $item_data->save();
            }
            if (isset($json['CharsiMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CharsiMax';
                $item_data->value = $json['CharsiMax'];
                $item_data->save();
            }
            if (isset($json['CharsiMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CharsiMagicMin';
                $item_data->value = $json['CharsiMagicMin'];
                $item_data->save();
            }
            if (isset($json['CharsiMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CharsiMagicMax';
                $item_data->value = $json['CharsiMagicMax'];
                $item_data->save();
            }
            if (isset($json['CharsiMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CharsiMagicLvl';
                $item_data->value = $json['CharsiMagicLvl'];
                $item_data->save();
            }
            if (isset($json['GheedMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'GheedMin';
                $item_data->value = $json['GheedMin'];
                $item_data->save();
            }
            if (isset($json['GheedMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'GheedMax';
                $item_data->value = $json['GheedMax'];
                $item_data->save();
            }
            if (isset($json['GheedMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'GheedMagicMin';
                $item_data->value = $json['GheedMagicMin'];
                $item_data->save();
            }
            if (isset($json['GheedMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'GheedMagicMax';
                $item_data->value = $json['GheedMagicMax'];
                $item_data->save();
            }
            if (isset($json['GheedMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'GheedMagicLvl';
                $item_data->value = $json['GheedMagicLvl'];
                $item_data->save();
            }
            if (isset($json['AkaraMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AkaraMin';
                $item_data->value = $json['AkaraMin'];
                $item_data->save();
            }
            if (isset($json['AkaraMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AkaraMax';
                $item_data->value = $json['AkaraMax'];
                $item_data->save();
            }
            if (isset($json['AkaraMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AkaraMagicMin';
                $item_data->value = $json['AkaraMagicMin'];
                $item_data->save();
            }
            if (isset($json['AkaraMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AkaraMagicMax';
                $item_data->value = $json['AkaraMagicMax'];
                $item_data->save();
            }
            if (isset($json['AkaraMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AkaraMagicLvl';
                $item_data->value = $json['AkaraMagicLvl'];
                $item_data->save();
            }
            if (isset($json['FaraMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'FaraMin';
                $item_data->value = $json['FaraMin'];
                $item_data->save();
            }
            if (isset($json['FaraMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'FaraMax';
                $item_data->value = $json['FaraMax'];
                $item_data->save();
            }
            if (isset($json['FaraMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'FaraMagicMin';
                $item_data->value = $json['FaraMagicMin'];
                $item_data->save();
            }
            if (isset($json['FaraMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'FaraMagicMax';
                $item_data->value = $json['FaraMagicMax'];
                $item_data->save();
            }
            if (isset($json['FaraMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'FaraMagicLvl';
                $item_data->value = $json['FaraMagicLvl'];
                $item_data->save();
            }
            if (isset($json['LysanderMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LysanderMin';
                $item_data->value = $json['LysanderMin'];
                $item_data->save();
            }
            if (isset($json['LysanderMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LysanderMax';
                $item_data->value = $json['LysanderMax'];
                $item_data->save();
            }
            if (isset($json['LysanderMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LysanderMagicMin';
                $item_data->value = $json['LysanderMagicMin'];
                $item_data->save();
            }
            if (isset($json['LysanderMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LysanderMagicMax';
                $item_data->value = $json['LysanderMagicMax'];
                $item_data->save();
            }
            if (isset($json['LysanderMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LysanderMagicLvl';
                $item_data->value = $json['LysanderMagicLvl'];
                $item_data->save();
            }
            if (isset($json['DrognanMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrognanMin';
                $item_data->value = $json['DrognanMin'];
                $item_data->save();
            }
            if (isset($json['DrognanMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrognanMax';
                $item_data->value = $json['DrognanMax'];
                $item_data->save();
            }
            if (isset($json['DrognanMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrognanMagicMin';
                $item_data->value = $json['DrognanMagicMin'];
                $item_data->save();
            }
            if (isset($json['DrognanMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrognanMagicMax';
                $item_data->value = $json['DrognanMagicMax'];
                $item_data->save();
            }
            if (isset($json['DrognanMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrognanMagicLvl';
                $item_data->value = $json['DrognanMagicLvl'];
                $item_data->save();
            }
            if (isset($json['HraltiMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HraltiMin';
                $item_data->value = $json['HraltiMin'];
                $item_data->save();
            }
            if (isset($json['HraltiMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HraltiMax';
                $item_data->value = $json['HraltiMax'];
                $item_data->save();
            }
            if (isset($json['HraltiMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HraltiMagicMin';
                $item_data->value = $json['HraltiMagicMin'];
                $item_data->save();
            }
            if (isset($json['HraltiMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HraltiMagicMax';
                $item_data->value = $json['HraltiMagicMax'];
                $item_data->save();
            }
            if (isset($json['HratliMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HratliMagicLvl';
                $item_data->value = $json['HratliMagicLvl'];
                $item_data->save();
            }
            if (isset($json['AlkorMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AlkorMin';
                $item_data->value = $json['AlkorMin'];
                $item_data->save();
            }
            if (isset($json['AlkorMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AlkorMax';
                $item_data->value = $json['AlkorMax'];
                $item_data->save();
            }
            if (isset($json['AlkorMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AlkorMagicMin';
                $item_data->value = $json['AlkorMagicMin'];
                $item_data->save();
            }
            if (isset($json['AlkorMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AlkorMagicMax';
                $item_data->value = $json['AlkorMagicMax'];
                $item_data->save();
            }
            if (isset($json['AlkorMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AlkorMagicLvl';
                $item_data->value = $json['AlkorMagicLvl'];
                $item_data->save();
            }
            if (isset($json['OrmusMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'OrmusMin';
                $item_data->value = $json['OrmusMin'];
                $item_data->save();
            }
            if (isset($json['OrmusMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'OrmusMax';
                $item_data->value = $json['OrmusMax'];
                $item_data->save();
            }
            if (isset($json['OrmusMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'OrmusMagicMin';
                $item_data->value = $json['OrmusMagicMin'];
                $item_data->save();
            }
            if (isset($json['OrmusMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'OrmusMagicMax';
                $item_data->value = $json['OrmusMagicMax'];
                $item_data->save();
            }
            if (isset($json['OrmusMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'OrmusMagicLvl';
                $item_data->value = $json['OrmusMagicLvl'];
                $item_data->save();
            }
            if (isset($json['ElzixMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'ElzixMin';
                $item_data->value = $json['ElzixMin'];
                $item_data->save();
            }
            if (isset($json['ElzixMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'ElzixMax';
                $item_data->value = $json['ElzixMax'];
                $item_data->save();
            }
            if (isset($json['ElzixMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'ElzixMagicMin';
                $item_data->value = $json['ElzixMagicMin'];
                $item_data->save();
            }
            if (isset($json['ElzixMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'ElzixMagicMax';
                $item_data->value = $json['ElzixMagicMax'];
                $item_data->save();
            }
            if (isset($json['ElzixMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'ElzixMagicLvl';
                $item_data->value = $json['ElzixMagicLvl'];
                $item_data->save();
            }
            if (isset($json['AshearaMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AshearaMin';
                $item_data->value = $json['AshearaMin'];
                $item_data->save();
            }
            if (isset($json['AshearaMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AshearaMax';
                $item_data->value = $json['AshearaMax'];
                $item_data->save();
            }
            if (isset($json['AshearaMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AshearaMagicMin';
                $item_data->value = $json['AshearaMagicMin'];
                $item_data->save();
            }
            if (isset($json['AshearaMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AshearaMagicMax';
                $item_data->value = $json['AshearaMagicMax'];
                $item_data->save();
            }
            if (isset($json['AshearaMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'AshearaMagicLvl';
                $item_data->value = $json['AshearaMagicLvl'];
                $item_data->save();
            }
            if (isset($json['CainMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CainMin';
                $item_data->value = $json['CainMin'];
                $item_data->save();
            }
            if (isset($json['CainMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CainMax';
                $item_data->value = $json['CainMax'];
                $item_data->save();
            }
            if (isset($json['CainMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CainMagicMin';
                $item_data->value = $json['CainMagicMin'];
                $item_data->save();
            }
            if (isset($json['CainMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CainMagicMax';
                $item_data->value = $json['CainMagicMax'];
                $item_data->save();
            }
            if (isset($json['CainMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'CainMagicLvl';
                $item_data->value = $json['CainMagicLvl'];
                $item_data->save();
            }
            if (isset($json['HalbuMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HalbuMin';
                $item_data->value = $json['HalbuMin'];
                $item_data->save();
            }
            if (isset($json['HalbuMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HalbuMax';
                $item_data->value = $json['HalbuMax'];
                $item_data->save();
            }
            if (isset($json['HalbuMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HalbuMagicMin';
                $item_data->value = $json['HalbuMagicMin'];
                $item_data->save();
            }
            if (isset($json['HalbuMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HalbuMagicMax';
                $item_data->value = $json['HalbuMagicMax'];
                $item_data->save();
            }
            if (isset($json['HalbuMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HalbuMagicLvl';
                $item_data->value = $json['HalbuMagicLvl'];
                $item_data->save();
            }
            if (isset($json['JamellaMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'JamellaMin';
                $item_data->value = $json['JamellaMin'];
                $item_data->save();
            }
            if (isset($json['JamellaMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'JamellaMax';
                $item_data->value = $json['JamellaMax'];
                $item_data->save();
            }
            if (isset($json['JamellaMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'JamellaMagicMin';
                $item_data->value = $json['JamellaMagicMin'];
                $item_data->save();
            }
            if (isset($json['JamellaMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'JamellaMagicMax';
                $item_data->value = $json['JamellaMagicMax'];
                $item_data->save();
            }
            if (isset($json['JamellaMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'JamellaMagicLvl';
                $item_data->value = $json['JamellaMagicLvl'];
                $item_data->save();
            }
            if (isset($json['LarzukMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LarzukMin';
                $item_data->value = $json['LarzukMin'];
                $item_data->save();
            }
            if (isset($json['LarzukMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LarzukMax';
                $item_data->value = $json['LarzukMax'];
                $item_data->save();
            }
            if (isset($json['LarzukMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LarzukMagicMin';
                $item_data->value = $json['LarzukMagicMin'];
                $item_data->save();
            }
            if (isset($json['LarzukMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LarzukMagicMax';
                $item_data->value = $json['LarzukMagicMax'];
                $item_data->save();
            }
            if (isset($json['LarzukMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'LarzukMagicLvl';
                $item_data->value = $json['LarzukMagicLvl'];
                $item_data->save();
            }
            if (isset($json['MalahMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'MalahMin';
                $item_data->value = $json['MalahMin'];
                $item_data->save();
            }
            if (isset($json['MalahMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'MalahMax';
                $item_data->value = $json['MalahMax'];
                $item_data->save();
            }
            if (isset($json['MalahMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'MalahMagicMin';
                $item_data->value = $json['MalahMagicMin'];
                $item_data->save();
            }
            if (isset($json['MalahMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'MalahMagicMax';
                $item_data->value = $json['MalahMagicMax'];
                $item_data->save();
            }
            if (isset($json['MalahMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'MalahMagicLvl';
                $item_data->value = $json['MalahMagicLvl'];
                $item_data->save();
            }
            if (isset($json['DrehyaMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrehyaMin';
                $item_data->value = $json['DrehyaMin'];
                $item_data->save();
            }
            if (isset($json['DrehyaMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrehyaMax';
                $item_data->value = $json['DrehyaMax'];
                $item_data->save();
            }
            if (isset($json['DrehyaMagicMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrehyaMagicMin';
                $item_data->value = $json['DrehyaMagicMin'];
                $item_data->save();
            }
            if (isset($json['DrehyaMagicMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrehyaMagicMax';
                $item_data->value = $json['DrehyaMagicMax'];
                $item_data->save();
            }
            if (isset($json['DrehyaMagicLvl'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'DrehyaMagicLvl';
                $item_data->value = $json['DrehyaMagicLvl'];
                $item_data->save();
            }
            if (isset($json['Source Art'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'Source Art';
                $item_data->value = $json['Source Art'];
                $item_data->save();
            }
            if (isset($json['Game Art'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'Game Art';
                $item_data->value = $json['Game Art'];
                $item_data->save();
            }
            if (isset($json['Source_Art'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'Source_Art';
                $item_data->value = $json['Source_Art'];
                $item_data->save();
            }
            if (isset($json['Game_Art'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'Game_Art';
                $item_data->value = $json['Game_Art'];
                $item_data->save();
            }
            if (isset($json['Transform'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'Transform';
                $item_data->value = $json['Transform'];
                $item_data->save();
            }
            if (isset($json['InvTrans'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'InvTrans';
                $item_data->value = $json['InvTrans'];
                $item_data->save();
            }
            if (isset($json['SkipName'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'SkipName';
                $item_data->value = $json['SkipName'];
                $item_data->save();
            }
            if (isset($json['NightmareUpgrade'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'NightmareUpgrade';
                $item_data->value = $json['NightmareUpgrade'];
                $item_data->save();
            }
            if (isset($json['HellUpgrade'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'HellUpgrade';
                $item_data->value = $json['HellUpgrade'];
                $item_data->save();
            }
            if (isset($json['mindam1'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'mindam1';
                $item_data->value = $json['mindam1'];
                $item_data->save();
            }
            if (isset($json['maxdam1'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'maxdam1';
                $item_data->value = $json['maxdam1'];
                $item_data->save();
            }
            if (isset($json['nameable'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'nameable';
                $item_data->value = $json['nameable'];
                $item_data->save();
            }
            if (isset($json['Nameable'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'nameable';
                $item_data->value = $json['Nameable'];
                $item_data->save();
            }
            if (isset($json['1or2handed'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = '1or2handed';
                $item_data->value = $json['1or2handed'];
                $item_data->save();
            }
            if (isset($json['2handed'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = '2handed';
                $item_data->value = $json['2handed'];
                $item_data->save();
            }
            if (isset($json['2handedwclass'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = '2handedwclass';
                $item_data->value = $json['2handedwclass'];
                $item_data->save();
            }
            if (isset($json['2handmaxdam'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = '2handmaxdam';
                $item_data->value = $json['2handmaxdam'];
                $item_data->save();
            }
            if (isset($json['2handmindam'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = '2handmindam';
                $item_data->value = $json['2handmindam'];
                $item_data->save();
            }
            if (isset($json['hit class'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'hit class';
                $item_data->value = $json['hit class'];
                $item_data->save();
            }
            if (isset($json['hit_class'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'hit_class';
                $item_data->value = $json['hit_class'];
                $item_data->save();
            }
            if (isset($json['maxmisdam'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'maxmisdam';
                $item_data->value = $json['maxmisdam'];
                $item_data->save();
            }
            if (isset($json['minmisdam'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'minmisdam';
                $item_data->value = $json['minmisdam'];
                $item_data->save();
            }
            if (isset($json['PermStoreItem'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'PermStoreItem';
                $item_data->value = $json['PermStoreItem'];
                $item_data->save();
            }
            if (isset($json['questdiffcheck'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'questdiffcheck';
                $item_data->value = $json['questdiffcheck'];
                $item_data->save();
            }
            if (isset($json['rangeadder'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'rangeadder';
                $item_data->value = $json['rangeadder'];
                $item_data->save();
            }
            if (isset($json['reqdex'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'reqdex';
                $item_data->value = $json['reqdex'];
                $item_data->save();
            }
            if (isset($json['setinvfile'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'setinvfile';
                $item_data->value = $json['setinvfile'];
                $item_data->save();
            }
            if (isset($json['spawnstack'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'spawnstack';
                $item_data->value = $json['spawnstack'];
                $item_data->save();
            }
            if (isset($json['special'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'special';
                $item_data->value = $json['special'];
                $item_data->save();
            }
            if (isset($json['wclass'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'wclass';
                $item_data->value = $json['wclass'];
                $item_data->save();
            }
            if (isset($json['*name'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = '*name';
                $item_data->value = $json['*name'];
                $item_data->save();
            }
            if (isset($json['calc1'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'calc1';
                $item_data->value = $json['calc1'];
                $item_data->save();
            }
            if (isset($json['calc2'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'calc2';
                $item_data->value = $json['calc2'];
                $item_data->save();
            }
            if (isset($json['calc3'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'calc3';
                $item_data->value = $json['calc3'];
                $item_data->save();
            }
            if (isset($json['cstate1'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'cstate1';
                $item_data->value = $json['cstate1'];
                $item_data->save();
            }
            if (isset($json['cstate2'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'cstate2';
                $item_data->value = $json['cstate2'];
                $item_data->save();
            }
            if (isset($json['autobelt'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'autobelt';
                $item_data->value = $json['autobelt'];
                $item_data->save();
            }
            if (isset($json['len'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'len';
                $item_data->value = $json['len'];
                $item_data->save();
            }
            if (isset($json['multibuy'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'multibuy';
                $item_data->value = $json['multibuy'];
                $item_data->save();
            }
            if (isset($json['spelldesc'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'spelldesc';
                $item_data->value = $json['spelldesc'];
                $item_data->save();
            }
            if (isset($json['spelldesccalc'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'spelldesccalc';
                $item_data->value = $json['spelldesccalc'];
                $item_data->save();
            }
            if (isset($json['spelldescstr'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'spelldescstr';
                $item_data->value = $json['spelldescstr'];
                $item_data->save();
            }
            if (isset($json['spellicon'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'spellicon';
                $item_data->value = $json['spellicon'];
                $item_data->save();
            }
            if (isset($json['stat1'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'stat1';
                $item_data->value = $json['stat1'];
                $item_data->save();
            }
            if (isset($json['stat2'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'stat2';
                $item_data->value = $json['stat2'];
                $item_data->save();
            }
            if (isset($json['stat3'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'stat3';
                $item_data->value = $json['stat3'];
                $item_data->save();
            }
            if (isset($json['state'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'state';
                $item_data->value = $json['state'];
                $item_data->save();
            }
            if (isset($json['szFlavorText'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'szFlavorText';
                $item_data->value = $json['szFlavorText'];
                $item_data->save();
            }
            if (isset($json['TMogMax'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'TMogMax';
                $item_data->value = $json['TMogMax'];
                $item_data->save();
            }
            if (isset($json['TMogMin'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'TMogMin';
                $item_data->value = $json['TMogMin'];
                $item_data->save();
            }
            if (isset($json['TMogType'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'TMogType';
                $item_data->value = $json['TMogType'];
                $item_data->save();
            }
            if (isset($json['Transmogrify'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'Transmogrify';
                $item_data->value = $json['Transmogrify'];
                $item_data->save();
            }
        }
        return view('itemviewer.upload');
    }

    public function gems()
    {

        $path = storage_path() . "/json/gems.json";

        $jsons = json_decode(
            file_get_contents($path), true
        );

        foreach ($jsons as $json) {
//            dd($json->code);
            $item_id = BaseItems::where('code', $json['code'])->first()->id;
//            dd($item_id);

            if (isset($json['letter'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'letter';
                $item_data->value = $json['letter'];
                $item_data->save();
            }
            if (isset($json['transform'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'transform';
                $item_data->value = $json['transform'];
                $item_data->save();
            }
            if (isset($json['nummods'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'nummods';
                $item_data->value = $json['nummods'];
                $item_data->save();
            }
            if (isset($json['weaponMod1Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod1Code';
                $item_data->value = $json['weaponMod1Code'];
                $item_data->save();
            }
            if (isset($json['weaponMod1Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod1Param';
                $item_data->value = $json['weaponMod1Param'];
                $item_data->save();
            }
            if (isset($json['weaponMod1Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod1Min';
                $item_data->value = $json['weaponMod1Min'];
                $item_data->save();
            }
            if (isset($json['weaponMod1Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod1Max';
                $item_data->value = $json['weaponMod1Max'];
                $item_data->save();
            }
            if (isset($json['weaponMod2Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod2Code';
                $item_data->value = $json['weaponMod2Code'];
                $item_data->save();
            }
            if (isset($json['weaponMod2Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod2Param';
                $item_data->value = $json['weaponMod2Param'];
                $item_data->save();
            }
            if (isset($json['weaponMod2Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod2Min';
                $item_data->value = $json['weaponMod2Min'];
                $item_data->save();
            }
            if (isset($json['weaponMod2Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod2Max';
                $item_data->value = $json['weaponMod2Max'];
                $item_data->save();
            }
            if (isset($json['weaponMod3Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod3Code';
                $item_data->value = $json['weaponMod3Code'];
                $item_data->save();
            }
            if (isset($json['weaponMod3Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod3Param';
                $item_data->value = $json['weaponMod3Param'];
                $item_data->save();
            }
            if (isset($json['weaponMod3Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod3Min';
                $item_data->value = $json['weaponMod3Min'];
                $item_data->save();
            }
            if (isset($json['weaponMod3Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'weaponMod3Max';
                $item_data->value = $json['weaponMod3Max'];
                $item_data->save();
            }
            if (isset($json['helmMod1Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod1Code';
                $item_data->value = $json['helmMod1Code'];
                $item_data->save();
            }
            if (isset($json['helmMod1Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod1Param';
                $item_data->value = $json['helmMod1Param'];
                $item_data->save();
            }
            if (isset($json['helmMod1Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod1Min';
                $item_data->value = $json['helmMod1Min'];
                $item_data->save();
            }
            if (isset($json['helmMod1Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod1Max';
                $item_data->value = $json['helmMod1Max'];
                $item_data->save();
            }
            if (isset($json['helmMod2Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod2Code';
                $item_data->value = $json['helmMod2Code'];
                $item_data->save();
            }
            if (isset($json['helmMod2Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod2Param';
                $item_data->value = $json['helmMod2Param'];
                $item_data->save();
            }
            if (isset($json['helmMod2Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod2Min';
                $item_data->value = $json['helmMod2Min'];
                $item_data->save();
            }
            if (isset($json['helmMod2Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod2Max';
                $item_data->value = $json['helmMod2Max'];
                $item_data->save();
            }
            if (isset($json['helmMod3Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod3Code';
                $item_data->value = $json['helmMod3Code'];
                $item_data->save();
            }
            if (isset($json['helmMod3Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod3Param';
                $item_data->value = $json['helmMod3Param'];
                $item_data->save();
            }
            if (isset($json['helmMod3Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod3Min';
                $item_data->value = $json['helmMod3Min'];
                $item_data->save();
            }
            if (isset($json['helmMod3Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'helmMod3Max';
                $item_data->value = $json['helmMod3Max'];
                $item_data->save();
            }
            if (isset($json['shieldMod1Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod1Code';
                $item_data->value = $json['shieldMod1Code'];
                $item_data->save();
            }
            if (isset($json['shieldMod1Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod1Param';
                $item_data->value = $json['shieldMod1Param'];
                $item_data->save();
            }
            if (isset($json['shieldMod1Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod1Min';
                $item_data->value = $json['shieldMod1Min'];
                $item_data->save();
            }
            if (isset($json['shieldMod1Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod1Max';
                $item_data->value = $json['shieldMod1Max'];
                $item_data->save();
            }
            if (isset($json['shieldMod2Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod2Code';
                $item_data->value = $json['shieldMod2Code'];
                $item_data->save();
            }
            if (isset($json['shieldMod2Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod2Param';
                $item_data->value = $json['shieldMod2Param'];
                $item_data->save();
            }
            if (isset($json['shieldMod2Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod2Min';
                $item_data->value = $json['shieldMod2Min'];
                $item_data->save();
            }
            if (isset($json['shieldMod2Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod2Max';
                $item_data->value = $json['shieldMod2Max'];
                $item_data->save();
            }
            if (isset($json['shieldMod3Code'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod3Code';
                $item_data->value = $json['shieldMod3Code'];
                $item_data->save();
            }
            if (isset($json['shieldMod3Param'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod3Param';
                $item_data->value = $json['shieldMod3Param'];
                $item_data->save();
            }
            if (isset($json['shieldMod3Min'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod3Min';
                $item_data->value = $json['shieldMod3Min'];
                $item_data->save();
            }
            if (isset($json['shieldMod3Max'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'shieldMod3Max';
                $item_data->value = $json['shieldMod3Max'];
                $item_data->save();
            }
            if (isset($json['level'])) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = 'level';
                $item_data->value = $json['level'];
                $item_data->save();
            }

        }

        return view('itemviewer.upload');
//        dd('saved');

    }
}
