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
                $item->desc = 'skills';
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
                    $item->desc = 'desc';
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

//        BaseItems::where('id', '!=', 0)->where('type', $id)->delete();
//        BaseItemsData::where('id', '!=', 0)->delete();

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
                foreach ($json as $key => $value) {
                    $item_data = new BaseItemsData();
                    $item_data->item_id = $item_id;
                    $item_data->key = $key;
                    $item_data->value = $value;
                    $item_data->code = $json['code'];
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
            $item_id = BaseItems::where('code', $json['code'])->first()->id;
            foreach ($json as $key => $value) {
                $item_data = new BaseItemsData();
                $item_data->item_id = $item_id;
                $item_data->key = $key;
                $item_data->value = $value;
                $item_data->code = $json['code'];
                $item_data->save();
            }
        }

        return view('itemviewer.upload');
//        dd('saved');

    }
}
