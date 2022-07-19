<div style="display: flex">
    <input type="text"
           class="myInput form-control"
           style="
                font-size: 16px;
                width: 100%;
                height: 45px;
                border-radius: 0;
                box-shadow: none;
                border: 0;
                transition: 0.3s;
                color: Black;
                padding: 0px 0px;
                "
           placeholder="Price for {{$Item->name}}"
           id="price"
           name="price"
           value="{{(!$Price ? '':$Price->value)}}"
           required
    >
    <button
        class="btn btn-outline-secondary"
        style="font-size: 16px"
        onclick="popClose();"
        type="submit"
        value="submit"
    >
        Add
    </button>
</div>

<script>
    function popClose() {
        var key = '{{$Item->code}}_price';
        var id = '0';
        var value = $('#price').val();

        var csrf = '{{csrf_token()}}';
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                'code': key,
                'value': value,
                '_token': csrf
            },
            url: '/user/mules/runes',
            success: function (data) {
                console.log(data);
            }
        });
        $('#{{$Item->code}}_price').html(value);
        jQuery("[class*=fu_popover_default]").remove();
    }

</script>
