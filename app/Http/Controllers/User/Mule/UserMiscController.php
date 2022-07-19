<?php

namespace App\Http\Controllers\User\Mule;

use App\Http\Controllers\Controller;
use App\Models\BaseItems;
use App\Models\BaseItemsData;
use App\Models\UserMisc;
use App\Models\UserMiscDesc;
use Illuminate\Http\Request;

class UserMiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['name']))
        {
            $USetting = \App\Models\UserMisc::where('mule', $_GET['name'])->where('user_id', auth()->user()->id)->first();
            if (!$USetting)
            {
                \App\Models\UserMisc::create([
                    'user_id' => auth()->user()->id,
                    'mule' => $_GET['name']
                ]);
            }
        }

        if( getUserData('show_runes') == false ) $Misc['rune'] = BaseItems::where('btype', 'rune')->get();

        if( getUserData('show_pgems') == false ) $Misc['pgems'] = BaseItems::where('code', 'gpv')
            ->orWhere('code', 'gpw')
            ->orWhere('code', 'gpg')
            ->orWhere('code', 'gpr')
            ->orWhere('code', 'gpb')
            ->orWhere('code', 'skz')
            ->orWhere('code', 'gpy')
            ->get();
        if( getUserData('show_fgems') == false ) $Misc['flawlessgems'] = BaseItems::where('code', 'gzv')
            ->orWhere('code', 'glw')
            ->orWhere('code', 'glg')
            ->orWhere('code', 'glr')
            ->orWhere('code', 'glb')
            ->orWhere('code', 'skl')
            ->orWhere('code', 'gly')
            ->get();
        if( getUserData('show_ngems') == false ) $Misc['normalgems'] = BaseItems::where('code', 'gsv')
            ->orWhere('code', 'gsw')
            ->orWhere('code', 'gsg')
            ->orWhere('code', 'gsr')
            ->orWhere('code', 'gsb')
            ->orWhere('code', 'sku')
            ->orWhere('code', 'gsy')
            ->get();
        if( getUserData('show_flgems') == false ) $Misc['flawedgems'] = BaseItems::where('code', 'gfv')
            ->orWhere('code', 'gfw')
            ->orWhere('code', 'gfg')
            ->orWhere('code', 'gfr')
            ->orWhere('code', 'gfb')
            ->orWhere('code', 'skf')
            ->orWhere('code', 'gfy')
            ->get();
        if( getUserData('show_cgems') == false ) $Misc['chippedgems'] = BaseItems::where('code', 'gcv')
            ->orWhere('code', 'gcw')
            ->orWhere('code', 'gcg')
            ->orWhere('code', 'gcr')
            ->orWhere('code', 'gcb')
            ->orWhere('code', 'skc')
            ->orWhere('code', 'gcy')
            ->get();
        if( getUserData('show_essence') == false ) $Misc['essence'] = BaseItems::where('code', 'bet') //Burning Essence of Terror
            ->orWhere('code', 'ceh') // Charged Essence of Hatred
            ->orWhere('code', 'fed') // Festering Essence of Destruction
            ->orWhere('code', 'tes') // Twisted Essence of Suffering
            ->orWhere('code', 'toa') // Token of Abolution
            ->orderBy('btype', 'DESC')
            ->get();
        if( getUserData('show_organs') == false ) $Misc['organs'] = BaseItems::where('code', 'bey') // Baals Eye
            ->orWhere('code', 'dhn') // Diablos Horn
            ->orWhere('code', 'mbr') // Mephistos Brain
            ->orderBy('btype', 'DESC')
            ->get();
        if( getUserData('show_keys') == false ) $Misc['key'] = BaseItems::where('code', 'pk1') // Key of Terror
            ->orWhere('code', 'pk2') // Key of Hate
            ->orWhere('code', 'pk3') // Key of Destruction
            ->orderBy('btype', 'DESC')
            ->get();
        $Misc['misc'] = BaseItems::where('btype', 'jewl')
            ->orWhere('btype', 'gold')
            ->orderBy('btype', 'DESC')
            ->get();
        if(isset($_GET['getmule'])) $UserMules = UserMisc::where('id', $_GET['getmule'])->get();
        else $UserMules = UserMisc::where('user_id', auth()->user()->id)->get();
        $UserMulesforDrop = UserMisc::where('user_id', auth()->user()->id)->get();

        if(isset($_GET['blank'])) return view('user.mule.indexblank', compact('Misc', 'UserMules'));
        else return view('user.mule.index', compact('Misc', 'UserMules', 'UserMulesforDrop'));
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
        $USetting = \App\Models\UserMiscDesc::where('user_misc_id', $request->id)->where('key', $request->code)->first();
        if ( isset($USetting->value) )
        {
            if ( $request->value == '' OR $request->value == 0 ) {
                UserMiscDesc::where('user_misc_id', $request->id)->where('key', $request->code)->delete();
                echo 'Deletet='.$request->code.'&val='.$request->value;
            } else {
                \App\Models\UserMiscDesc::where('user_misc_id', $request->id)
                    ->where('key', $request->code)
                    ->update([
                        'value' => ($request->value == '' ? 0 : $request->value)
                    ]);
                echo 'Updated='.$request->code.'&val='.$request->value;
            }
        }
        else
        {
            if ( $request->value == '' OR $request->value == 0 ) {
                echo 'NoCreate='.$request->code.'&val='.$request->value;
            } else {
                \App\Models\UserMiscDesc::create([
                    'key' => $request->code,
                    'value' => ($request->value == '' ? 0 : $request->value),
                    'user_id' => auth()->user()->id,
                    'user_misc_id' => $request->id
                ]);
                echo 'Created=' . $request->code . '&val=' . $request->value;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
        $Item = BaseItems::where('code', $id)->first();
        $Price = UserMiscDesc::where('key', $Item->code.'_price')->where('user_id', auth()->user()->id)->first();
        return view('user.mule.show', compact('Item', 'Price'));
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
        dd($request, $id);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        UserMiscDesc::where('user_misc_id', $id)->delete();
        UserMisc::where('id', $id)->delete();
        return redirect()->action('\App\Http\Controllers\User\Mule\UserMiscController@index');
    }
}
