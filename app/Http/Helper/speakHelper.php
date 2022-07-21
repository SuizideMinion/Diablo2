<?php

use App\Models\Speak;
use App\Models\Strings;

function Speak($key, $lang, $array = [])
{
    $Speak = Speak::where('key', $key)->where('lang', $lang)->first();
    if ( isset($Speak->value) ) {
        $string = $Speak->value;
        foreach($array as $key => $value)
        {
            $string = str_replace($key, $value, $string);
        }
        return $string;
    }

    $String = Strings::where('key', $key)->first();
    if ( isset($String->value) ) {
        $string = preg_split('/\n/', $String->value);
        $string = array_reverse($string);
        $string = implode ("<br>",$string);
        return $string;
    }
    else {
        $String = Strings::where('key', 'dummy')->first();
        return "<s title='". $key ."'>". $String->value ."</s>";
    }
}

function pSpeak($key, $param, $min , $max, $lang = 'EN', $item_id = false)
{
    $array = [];
    $array[':wert'] = ( $min == $max ? $min : $min.' - '.$max);
    if($key == 'sock') {
        $maxsockets = \App\Models\BaseItemsData::where('item_id', $item_id)->where('key', 'gemsockets')->first();
        if ( $param != '0') $param = ($param > $maxsockets->value ? $maxsockets->value : $param);
        if ( $max != '0') $max = ($max > $maxsockets->value ? $maxsockets->value : $max);
        $array[':wert'] = ( $min == $max ? $param : $min.' - '.$max);
    }
    if($key == 'rep-dur') {
        $array[':wert'] = $param;
    }
    if($key == 'dmg-pois') {
        $array[':sec'] = round($min / 25);
        $array[':wert'] = $param;
    }
    if($key == 'dmg-und/lvl') {
        $array[':wert'] = $param;
    }

    $Speak = Speak::where('key', $key .''. ($param != 0 ? $param:''))->where('lang', $lang)->first();
    if ( isset($Speak->value) ) {
        $string = $Speak->value;
        foreach($array as $key => $value)
        {
            $string = str_replace($key, $value, $string);
        }
        return ($string != "" ? $string .'<br>':'');
    }
    $Speak = \App\Models\PropertiesString::where('key', $key)->where('lang', $lang)->first();
    if ( isset($Speak->value) ) {
        $string = $Speak->value;
        if( $key == 'hit-skill'
            || $key == 'att-skill'
            || $key == 'gethit-skill'
            || $key == 'kill-skill'
            || $key == 'death-skill'
            || $key == 'levelup-skill'
            || $key == 'charged') {
            $string = str_replace(':wert', $min, $string);
            $string = str_replace(':lvl', $max, $string);

        }
        foreach($array as $key => $value)
        {
            $string = str_replace($key, $value, $string);
        }

        if (str_contains($string, '[Skill]'))
        {
            if( is_numeric($param) )
            {
                $skill = \App\Models\Skill::where('orgin_id', $param)->where('key', 'skilldesc')->first();
            } else {
                $skill = \App\Models\Skill::where('name', $param)->where('key', 'skilldesc')->first();
            }
            $skill_name = \App\Models\Skill::where('name', $skill->name)->where('key', 'str name')->first();
            if(!$skill_name) dd($skill_name, $skill);
            $strings = Strings::where('key', $skill_name->value)->first();
//            if (!$strings) {
//                $strings = Strings::where('key', 'skillsname'. $skill->value)->first();
//            }
            if (!$strings) dd('error1'. $string, $skill->value);
            $string = str_replace('[Skill]', $strings->value, $string);
            if (str_contains($string, '[Class]'))
            {
//                dd($skill);
                $charclass = \App\Models\Skill::where('name', $skill->name)->where('key', 'charclass')->first();
                if(!$charclass) return 'error2'. $string;
                $strings = Strings::where('key', 'partychar'. $charclass->value)->first();
                if (!$strings) return '[Class]3'. $string;
                $string = str_replace('[Class]', $strings->value, $string);
            }
        }
        return ($string != "" ? $string .'<br>':'');
    }
}

function getInvFile($code, $UniqueID = false) {
    $Updates = \App\Models\Update::where('key', 'invfile')->where('code', $code)->first();
    if ($Updates) return '/uploads/'. $Updates->value;

    // $Unique = \App\Models\UniqueItemsData:: ->> Geht nicht da Code in Data noch fehlt !

    $Base = \App\Models\BaseItemsData::where('code', $code)->where('key', 'invfile')->first();
    if ($Base) return '/items/'. strtolower($Base->value) .'.jpg';
}

?>
