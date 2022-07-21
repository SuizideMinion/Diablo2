
@php
    if ($Price) $price = explode('|', $Price->value);
    @endphp
<div style="display: flex">
    <input type="text"
           class="myInput form-control"
           style="
                    font-size: 10px;
                    width: 40%;
                    height: 20px;
                    border: 1px solid;
                    box-shadow: none;
                    border-style: dotted;
                    transition: 0.3s;
                    color: Black;
                    padding: 0px 0px;
                    "
           value="how many"
           disabled
    >
    <input type="text"
           class="myInput form-control"
           style="
                font-size: 10px;
                width: 60%;
                height: 20px;
                border: 1px solid;
                box-shadow: none;
                border-style: dotted;
                transition: 0.3s;
                color: Black;
                padding: 0px 0px;
                "
           value="for Price"
           disabled
    >
    <button
        class="btn btn-outline-secondary"
        style="font-size: 16px;height: 20px;padding: 0px 12px"
        onclick="popCloseButton();"
        type=""
        value=""
    >
        <i class="bi bi-x"></i>
    </button>
</div>
<form>
    <div style="display: flex">
        <input type="text"
               class="myInput form-control"
               style="
                    font-size: 16px;
                    width: 40%;
                    height: 45px;
                    border: 1px solid;
                    box-shadow: none;
                    border-style: dotted;
                    transition: 0.3s;
                    color: Black;
                    padding: 0px 0px;
                    "
               placeholder="Price for {{$Item->name}}"
               id="pack"
               name="pack"
               value="{{( $Price ? $price[0] : 1 )}}"
               required
        >
        <input type="text"
               class="myInput form-control"
               style="
                    font-size: 16px;
                    width: 60%;
                    height: 45px;
                    border: 1px solid;
                    box-shadow: none;
                    border-style: dotted;
                    transition: 0.3s;
                    color: Black;
                    padding: 0px 0px;
                    "
               placeholder="Price for {{$Item->name}}"
               id="price"
               name="price"
               value="{{( $Price ? $price[1] : 1 )}}"
               required
        >
        <button
            class="btn btn-outline-secondary"
            style="font-size: 16px"
            onclick="popClose();"
            type="submit"
            value="submit"
        >
            <i class="bi bi-check2"></i>
        </button>
    </div>
</form>

<script>
    function popClose() {
        var key = '{{$Item->code}}_price';
        var id = '0';
        var value = $('#price').val();
        var pack = $('#pack').val();
        var server = '{{$server}}';

        var csrf = '{{csrf_token()}}';
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                'code': key,
                'value': pack +'|'+ value,
                '_token': csrf
            },
            url: '/user/mules/runes/'+ server +'/store',
            success: function (data) {
                console.log(data);
            }
        });
        $('#{{$Item->code}}_price').html(value +'.'+ (pack > 1 ? 'p':'e'));
        jQuery("[class*=fu_popover_default]").remove();
    }

    function popCloseButton() {
        jQuery("[class*=fu_popover_default]").remove();
    }
</script>
