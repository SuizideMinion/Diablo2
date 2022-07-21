<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>D2Mul.es</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {{--    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>
Setting for {{$id}}
<form action="" method="post" role="form" class="mt-4" style="max-width: 95%">
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'rune_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="rune_header" class="form-label">Runen Header</label>
            <input
                type="text"
                name="rune_header"
                class="myInputsmall updaterunes"
                id="update"
                dataid="0"
                datacode="rune_header"
                value="{{($header ? $header->value : '')}}"
            >
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'rune_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="rune_format" class="form-label">Runen String</label>
            <input
                type="rune_format"
                class="myInputsmall"
                name="rune_format"
                id="rune_format"
                dataid="0"
                datacode="rune_format"
                value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}"
            >
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'pgems_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="pgems_header" class="form-label">Perfect Gems Header</label>
            <input type="text"dataid="0" datacode="pgems_header" name="pgems_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'pgems_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="pgems_format" class="form-label">Perfect Gems String</label>
            <input type="pgems_format" dataid="0" datacode="pgems_format" class="myInputsmall" name="pgems_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'flawlessgems_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="flawlessgems_header" class="form-label">Flawless Gems Header</label>
            <input type="text" name="flawlessgems_header" dataid="0" datacode="flawlessgems_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'flawlessgems_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="flawlessgems_format" class="form-label">Flawless Gems String</label>
            <input type="flawlessgems_format" dataid="0" datacode="flawlessgems_format" class="myInputsmall" name="flawlessgems_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'normalgems_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="normalgems_header" class="form-label">Normal Gems Header</label>
            <input type="text" name="normalgems_header" dataid="0" datacode="normalgems_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'normalgems_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="normalgems_format" class="form-label">Normal Gems String</label>
            <input type="normalgems_format" dataid="0" datacode="normalgems_format" class="myInputsmall" name="normalgems_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'flawedgems_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="flawedgems_header" class="form-label">Flawed Gems Header</label>
            <input type="text" name="flawedgems_header" dataid="0" datacode="flawedgems_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'flawedgems_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="flawedgems_format" class="form-label">Flawed Gems String</label>
            <input type="flawedgems_format" dataid="0" datacode="flawedgems_format" class="myInputsmall" name="flawedgems_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'chippedgems_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="chippedgems_header" class="form-label">Chipped Gems Header</label>
            <input type="text" name="chippedgems_header" dataid="0" datacode="chippedgems_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'chippedgems_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="chippedgems_format" class="form-label">Chipped Gems String</label>
            <input type="chippedgems_format" dataid="0" datacode="chippedgems_format" class="myInputsmall" name="chippedgems_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'essence_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="essence_header" class="form-label">Essence Header</label>
            <input type="text" name="essence_header" dataid="0" datacode="essence_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'essence_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="essence_format" class="form-label">Essence String</label>
            <input type="essence_format" dataid="0" datacode="essence_format" class="myInputsmall" name="essence_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'organs_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="organs_header" class="form-label">Organs Header</label>
            <input type="text" name="organs_header" dataid="0" datacode="organs_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'organs_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="organs_format" class="form-label">Organs String</label>
            <input type="organs_format" dataid="0" datacode="organs_format" class="myInputsmall" name="organs_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'key_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="key_header" class="form-label">Keys Header</label>
            <input type="text" name="key_header" dataid="0" datacode="key_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'key_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="key_format" class="form-label">Keys String</label>
            <input type="key_format" dataid="0" datacode="key_format" class="myInputsmall" name="key_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mt-3">
            @php $header = \App\Models\UserMiscDesc::where('key', 'misc_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="misc_header" class="form-label">Misc Header</label>
            <input type="text" name="misc_header" dataid="0" datacode="misc_header" class="myInputsmall" id="update" value="{{($header ? $header->value : '')}}">
        </div>
        <div class="col-md-8 form-group mt-3">
            @php $format = \App\Models\UserMiscDesc::where('key', 'misc_format')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
            <label for="misc_format" class="form-label">Misc String</label>
            <input type="misc_format" dataid="0" datacode="misc_format" class="myInputsmall" name="misc_format" id="update" value="{{($format ? $format->value : ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]')}}">
        </div>
    </div>
</form>

{{--        $Misc['rune']--}}
{{--        $Misc['pgems'] --}}
{{--        $Misc['flawlessgems'] --}}
{{--        $Misc['normalgems'] --}}
{{--        $Misc['flawedgems']  --}}
{{--        $Misc['chippedgems'] --}}
{{--        $Misc['essence']--}}
{{--        $Misc['organs']--}}
{{--        $Misc['key']--}}
{{--        $Misc['misc']--}}
<script src="/assets/js/jquery1.7.1.js"></script>

<script>
    $('input[id=update]').focusout(function (e) {//"#update"
        e.preventDefault();
        var code = $(this).attr('datacode');
        var id = $(this).attr('dataid');
        var value = $(this).val();
        var csrf = '{{csrf_token()}}';
        var server = '{{$id}}';
        if (id != 0)
        {
            if (value > 0) {
                $(this).css("color", "White");
                value = value.replace(/^0+/, '');
                $(this).val(value);
            } else {
                $(this).css("color", "Black");
                $(this).val('0');
            }
        }
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                'code': code,
                'value': value,
                '_token': csrf
            },
            url: '/user/mules/runes/'+ server +'/store',
            success: function (data) {
                console.log(data);
            }
        });
    });
</script>
</html>
