<?php

namespace App\Http\Controllers\itemviewer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\getBaseItem;
use App\Http\Controllers\getUniqueItem;
use App\Models\BaseItems;
use App\Models\UniqueItems;
use Illuminate\Http\Request;

class UniqueCountroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Uniques = UniqueItems::all();//all();//all();//all();//where('type', 'weapon')->get
        $grouped = $Uniques->groupBy('btype');

        if (!isset($Uniques)) abort(404); //TODO:: abort funktioniert noch nicht

        foreach ( $Uniques as $unique)
        {
            $UniqueItems[$unique->id]['uniqueItem'] = new getUniqueItem($unique->id);
            $UniqueItems[$unique->id]['baseitem'] = new getBaseItem($unique->code);
        }
//        dd($UniqueItems);
        return view('itemviewer.unique', compact('UniqueItems', 'grouped'));
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
        //
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
