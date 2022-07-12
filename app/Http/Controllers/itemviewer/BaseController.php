<?php

namespace App\Http\Controllers\itemviewer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\getBaseItem;
use App\Models\BaseItems;
use Illuminate\Http\Request;
use function abort;
use function dd;
use function view;

class BaseController extends Controller
{
    public function all($id)
    {
        $bases = BaseItems::where('type', $id)->get();//all();//all();//all();//where('type', 'weapon')->get
        $grouped = $bases->groupBy('btype');

        if (!isset($bases)) abort(404); //TODO:: abort funktioniert noch nicht

        foreach ( $bases as $base)
        {
            $baseItems[$base->code] = new getBaseItem($base->id);
        }
//        dd($baseItems);
        return view('itemviewer.base', compact('baseItems', 'grouped'));
    }

    public function index()
    {
        dd('hello world');
    }

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
        $baseItem = new getBaseItem($id);
//        dd($baseItem);
        $baseItems = [];
        if ( isset($baseItem->itemLevelN) AND $baseItem->itemLevelN != $baseItem->code ) $baseItems[0] = new getBaseItem($baseItem->itemLevelN);
        else $baseItems[0] = $baseItem;
        if ( isset($baseItem->itemLevelA) AND $baseItem->itemLevelA != $baseItem->code ) $baseItems[1] = new getBaseItem($baseItem->itemLevelA);
        elseif($baseItem->itemLevel != 0) $baseItems[1] = $baseItem;
        if ( isset($baseItem->itemLevelH) AND $baseItem->itemLevelH != $baseItem->code  ) $baseItems[2] = new getBaseItem($baseItem->itemLevelH);
        elseif($baseItem->itemLevel != 0) $baseItems[2] = $baseItem;
//        dd($baseItems);
        return view('itemviewer.base_show', compact('baseItems', 'id'));
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
