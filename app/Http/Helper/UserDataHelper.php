<?php

function getUserData($string) {
    $UserData = \App\Models\UserData::where('user_id', auth()->user()->id)->where('key', $string)->first();
    if(!$UserData) return false;
    elseif ($UserData->value == 0) return false;
    else return $UserData->value;
//    dd($string);
}

?>
