<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $USetting = \App\Models\UserData::where('user_id', auth()->user()->id)->where('key', $request->key)->first();
        if ( isset($USetting->value) )
        {
//            if ($request->value == '' ) {
//                UserMiscDesc::where('user_misc_id', $id)->delete();
//            }
            \App\Models\UserData::where('user_id', auth()->user()->id)
                ->where('key', $request->key)
                ->update([
                    'value' => $request->value
                ]);
            echo 'Update=key='.$request->key.'&value='.$request->value;
        }
        else
        {
            \App\Models\UserData::create([
                'key' => $request->key,
                'value' => $request->value,
                'user_id' => auth()->user()->id
            ]);
            echo 'New=key='.$request->key.'&value='.$request->value;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
