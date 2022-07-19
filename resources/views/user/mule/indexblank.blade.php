@foreach($Misc as $test)
    [LIST]
    @foreach($test as $row)
        @php $value = \App\Models\UserMiscDesc::where('user_id', auth()->user()->id)->where('key', $row->code)->sum('value') @endphp
        @php $price = \App\Models\UserMiscDesc::where('user_id', auth()->user()->id)->where('key', $row->code.'_price')->first(); @endphp
        @if($value != 0)
            [*]
            » {{$value}}x «
            @if($row->btype == 'rune') [COLOR=orange] @endif
            [B]--- {{$row->name}} ---[/B]
            @if($row->btype == 'rune') [/COLOR] @endif
            @if($price)
                » [COLOR=maroon][B]{{$price->value}}[/B][/COLOR] FG «{{$value > 0 ? '[COLOR=white]/each[/COLOR]':''}}
            @endif
            <br>
        @endif
    @endforeach
    [/LIST]
    <br>
@endforeach
<br>[CODE]List Createt with MuleHelper from D2Mul.es[/CODE]
