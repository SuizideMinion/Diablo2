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
<button onclick="copyToClipboard('#copy')">Copy this text</button>
<div id="copy">
    @foreach($Misc as $Header => $test)
        @php $data = \App\Models\UserMiscDesc::where('key', $Header.'_header')->where('user_id', auth()->user()->id)->where('server', $id)->first() @endphp
        {{($data ? $data->value : '')}}
        [LIST]
        @foreach($test as $row)
            @php $value = \App\Models\UserMiscDesc::where('user_id', auth()->user()->id)->where('key', $row->code)->where('server', $id)->sum('value') @endphp
            @php $price = \App\Models\UserMiscDesc::where('user_id', auth()->user()->id)->where('key', $row->code.'_price')->where('server', $id)->first(); @endphp
            @if($value != 0)
                [*]
                @php $data = \App\Models\UserMiscDesc::where('key', $Header.'_format')->where('user_id', auth()->user()->id)->where('server', $id)->first();
                if(!$data) $data = ':sum [COLOR=orange] [B] :item [/B] [/COLOR] [COLOR=Green][B]:price[/B][/COLOR] FG[COLOR=white]:each(:psize)[/COLOR]';
                else $data = $data->value;
                $string = str_replace(":sum", $value, $data);
                $string = str_replace(":item", $row->name, $string);
                if($price)
                {
                    $priceval = explode('|', $price->value);
                    $string = str_replace(":each", ($priceval[0] >= 1 ? '/pack' : '/each'), $string);
                    $string = str_replace(":price", ($priceval[1] ? $priceval[1] : ''), $string);
                    $string = str_replace(":psize", $priceval[0], $string);
                }
                @endphp
                {{$string}}
            @endif
        @endforeach
        [/LIST]
    @endforeach
    <br>[CODE]List Createt with MuleHelper from D2Mul.es[/CODE]
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    // Copy to clipboard function
    function copyToClipboard(element) {
        // Create temporary variable
        var $temp = $("<input>");
        $("body").append($temp);
        // Select all content from element
        $temp.val($(element).html()).select();
        // Copy selected content
        document.execCommand("copy");
        // Remove temporary variable
        $temp.remove();
    }
</script>
<!-- Vendor JS Files -->
<script src="/assets/js/popover.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
{{--<script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>--}}
{{--<script src="/assets/vendor/php-email-form/validate.js"></script>--}}
<script src="/assets/js/jquery1.7.1.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
</body>

</html>
