<x-app-layout>

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume section-show">
        <div class="container">

            <div class="section-title">
                <div style="float:left"><h2>Gems and Runes Muleaccounts</h2></div>

                <div style="float:right;display: flex">
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="margin: 3px;">
                            my Mules
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach($UserMulesforDrop as $row)
                                <li><a class="dropdown-item" href="/user/mules/runes?getmule={{$row->id}}">{{$row->mule}}</a></li>
                            @endforeach
                            <li><a class="dropdown-item" href="/user/mules/runes">Show All</a></li>
                        </ul>
                    </div>
                    <div class="input-group mb-3">
                        <form action="" type="GET" style="display: flex">
                            <input type="text" class="myInput form-control" placeholder="New Mulechar" id="name"
                                   name="name" required>
                            <button class="btn btn-outline-secondary" type="submit" value="submit">Add</button>
                        </form>
                    </div>
                </div>
                {{--                <p>News from D2Mul.es</p>--}}
            </div>

            <div style="display: flex;width: 100%;justify-content: space-between;">
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_names" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_names') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">show Names </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_runes" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_runes') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Runes </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_pgems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_pgems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Perfect Gems </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_fgems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_fgems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Flawless Gems </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_ngems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_ngems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Normal Gems </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_flgems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_flgems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Flawed Gems </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_cgems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_cgems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Chipped Gems </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_essence" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_essence') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Essences </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_organs" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_organs') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Organs </label>
                </div>
                <div class="form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_keys" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_keys') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Keys </label>
                </div>
            </div>
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <td scope="col" style="width: 45px"></td>
                    @if(getUserData('show_names') == false)
                        <td scope="col" style="width: 250px"></td> @endif
                    @foreach($UserMules as $row)
                        <td class="table-td" scope="col">{{$row->mule}}

                            <div style="float:right">
                                <span>
                                    <form class=""
                                          action="{{ action('\App\Http\Controllers\User\Mule\UserMiscController@destroy',  $row->id) }}"
                                          method="post">
                                        <button style="padding: 0rem 0rem;" class="btn btn-link" type="submit"><i
                                                class="bi bi-x"></i></button>
                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                        {{ method_field('DELETE') }}
                                        {!! csrf_field() !!}
                                    </form>
                                {{--                                    <a method="delete"--}}
                                {{--                                       href="{{ action('\App\Http\Controllers\User\Mule\UserMiscController@destroy',  $row->id) }}"></a></span>--}}
                            </div>
                        </td>
                    @endforeach
                    <td scope="col" style="width: 45px">price</td>
                    <td scope="col" style="width: 45px">sum</td>
                </tr>
                </thead>
                <tbody>
                @foreach($Misc as $test)
                    @foreach($test as $row)
                        <tr id="{{$row->code}}">
                            <td scope="col"><img
                                    title="{{$row->name}}"
                                    src="/items/{{\App\Models\BaseItemsData::where('item_id', $row->id)->where('key', 'invfile')->first()->value}}.jpg"
                                    style="height: 30px"></td>

                            @if(getUserData('show_names') == false)
                                <td scope="col">{{$row->name}}</td> @endif
                            @foreach($UserMules as $UserMule)
                                @php $UserRune = \App\Models\UserMiscDesc::where('user_misc_id', $UserMule->id)->where('key', $row->code)->first(); @endphp

                                <td class="table-td" scope="col" style="padding: 0px 0px;">
                                    <input type="number"
                                           onchange="calculate('{!! $row->code !!}')"
                                           name="{{$row->code}}.{{$UserMule->id}}"
                                           id="update"
                                           class="update{{$row->code}}"
                                           dataid="{{$UserMule->id}}"
                                           datacode="{{$row->code}}"
                                           value="{{(!$UserRune ? '0' : $UserRune->value)}}"
                                           style="width: 100%; @if(isset($UserRune)) {{$UserRune->value == 0 ? 'color:Black;': ''}} @else color:Black; @endif">
                                </td>

                            @endforeach
                            @php $UserPrice = \App\Models\UserMiscDesc::where('user_id', auth()->user()->id)->where('key', $row->code.'_price')->first(); @endphp
                            <td id="price{{$row->code}}" scope="col" style="width: 45px">
                                <button
                                    type="button"
                                    class="btn btn-link"
                                    id="{{$row->code}}_price"
                                    onclick="makePopover('{{$row->code}}');makePrice('{!! $row->code !!}')"
                                    style="padding: 0px;color: white;text-decoration: none;"
                                    data-bs-toggle="popover"
                                    title="{{$row->name}} Price"
                                    data-bs-html="true"
                                    data-bs-placement="left"
                                    data-bs-content="123">
                                    {{(!$UserPrice ? '0' : $UserPrice->value)}}
                                </button>
                            </td>
                            <td id="sum{{$row->code}}" scope="col" style="width: 45px">
                                {{\App\Models\UserMiscDesc::where('user_id', auth()->user()->id)->where('key', $row->code)->sum('value')}}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>

            </table>

        </div>
    </section><!-- End Resume Section -->
    @section('script')

        <script src="http://gsreddy.in/popover/js/popover.min.js"></script>

        <script>
            function makePopover(val) {
                $("[class*=fu_popover_default]").remove();
                $('#' + val + '_price').fu_popover({
                    content: 'Hello !',
                    width: '250px',
                    placement: 'left'
                });

                $.ajax({
                    type: 'GET',
                    data: {
                        'code': val
                    },
                    url: '/user/mules/runes/'+val+'/edit',
                    success: function (data) {
                        // console.log(data);
                        $('.fu_popover_default').text('');
                        $('.fu_popover_default').append(data);
                    }
                });
            }
            function calculate(val) {
                jQuery('input[class=update' + val + ']').change(function (e) {
                    var total = 0;
                    $('#' + val).each(function () {
                        $.each(this.cells, function () {
                            total += parseInt($(this).find('input').val(), 10) || 0;
                            $('#sum' + val).html(total);
                        });

                    });
                });
            }

            $('input[id=update]').change(function (e) {//"#update"
                e.preventDefault();
                var code = $(this).attr('datacode');
                var id = $(this).attr('dataid');
                var value = $(this).val();
                if (value > 0) {
                    $(this).css("color", "White");
                    value = value.replace(/^0+/, '');
                    $(this).val(value);
                } else {
                    $(this).css("color", "Black");
                    $(this).val('0');
                }
                var csrf = '{{csrf_token()}}';
                $.ajax({
                    type: 'POST',
                    data: {
                        'id': id,
                        'code': code,
                        'value': value,
                        '_token': csrf
                    },
                    url: '/user/mules/runes',
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
            $('input[type="checkbox"]').click(function () {
                var key = $(this).attr('datacode');
                if ($(this).prop("checked") == true) {
                    var value = 0;
                } else if ($(this).prop("checked") == false) {
                    var value = 1;
                }
                var csrf = '{{csrf_token()}}';

                $.ajax({
                    type: 'POST',
                    data: {
                        'key': key,
                        'value': value,
                        '_token': csrf
                    },
                    url: '/user/data',
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        </script>
    @endsection
</x-app-layout>

