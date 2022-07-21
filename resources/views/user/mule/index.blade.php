<x-app-layout>

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume section-show">
        <div class="container">

            <div class="section-title">
                <div style="float:left"><h2>Gems and Runes Muleaccounts</h2></div>
                <div class="row"  style="float:right;display: flex">
                    <div class="col" style="float:right;display: flex">
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                   style="margin: 3px;">
                                    Server
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="/user/mules/runes/scl">Soft Core Ladder</a></li>
                                    <li><a class="dropdown-item" href="/user/mules/runes/hcl">Hard Core Ladder</a></li>
                                    <li><a class="dropdown-item" href="/user/mules/runes/scnl">Soft Core Non Ladder</a>
                                    </li>
                                    <li><a class="dropdown-item" href="/user/mules/runes/hcnl">Hard Core Non Ladder</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                   style="margin: 3px;">
                                    my Mules
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach($UserMulesforDrop as $row)
                                        <li><a class="dropdown-item"
                                               href="/user/mules/runes/{{$id}}?getmule={{$row->id}}">{{$row->mule}}</a></li>
                                    @endforeach
                                    <li><a class="dropdown-item" href="/user/mules/runes/{{$id}}">Show All</a></li>
                                </ul>
                            </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <form action="/user/mules/runes/{{$id}}/new" type="POST" method="post"
                                  style="display: flex">
                                @csrf
                                @method('POST')
                                <input type="text" class="myInput form-control" placeholder="New Mulechar" id="name"
                                       name="name" style="width: 200px" required>
                                <input type="hidden" id="server" name="srv" value="{{$id}}">
                                <button class="btn btn-outline-secondary" type="submit" value="submit">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_names" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_names') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">show Names</label>
                </div>
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_runes" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_runes') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Runes</label>
                </div>
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_pgems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_pgems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Perfect Gems</label>
                </div>
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_fgems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_fgems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Flawless Gems</label>
                </div>
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_ngems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_ngems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Normal Gems</label>
                </div>
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_flgems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_flgems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Flawed Gems</label>
                </div>
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_cgems" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_cgems') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Chipped Gems</label>
                </div>
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_essence" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_essence') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Essences </label>
                </div>
                <div class="col form-check form-switch">
                    <input onClick="window.setTimeout(function(){location.reload()},500);" id="check"
                           datacode="show_organs" class="form-check-input" type="checkbox" role="switch"
                           id="flexSwitchCheckDefault"
                        {{(getUserData('show_organs') == false ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Organs </label>
                </div>
                <div class="col form-check form-switch">
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
                                          action="{{ action('\App\Http\Controllers\User\Mule\UserMiscController@destroy',  [$id, 'id='. $row->id]) }}"
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
                                    src="{{strtolower(getInvFile($row->code))}}"
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
                            @php
                                $UserPrice = \App\Models\UserMiscDesc::where('user_id', auth()->user()->id)->where('key', $row->code.'_price')->where('server', $id)->first();
                                if($UserPrice) $UPrice = explode('|', $UserPrice->value);
                            @endphp
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
                                    {{(!$UserPrice ? '0' : ($UPrice[0] >= 2 ? $UPrice[1].'.p' : $UPrice[1].'.e'))}}
                                </button>
                            </td>
                            <td id="sum{{$row->code}}" scope="col" style="width: 45px">
                                {{\App\Models\UserMiscDesc::where('user_id', auth()->user()->id)->where('key', $row->code)->where('server', $id)->sum('value')}}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>

            </table>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link"
                        id="JSP-tab"
                        onclick="self.frames['JSPFrame'].location.href = '/user/mules/runes/{{$id}}/?blank=1';"
                        data-bs-toggle="tab"
                        data-bs-target="#JSP"
                        type="button"
                        role="tab"
                        aria-controls="JSP"
                        aria-selected="false"
                    >
                        JSP
                    </button>
                </li>
                <li class="nav-item" role="setting" style="float: right;margin-left: auto;">
                    <button
                        class="nav-link"
                        id="setting-tab"
                        onclick="self.frames['SettingFrame'].location.href = '/user/settings/mules/runes/{{$id}}';"
                        data-bs-toggle="tab"
                        data-bs-target="#setting"
                        type="button" role="tab"
                        aria-controls="setting"
                        aria-selected="false"
                    >
                        Settings
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="JSP" role="tabpanel" aria-labelledby="JSP-tab">
                    <iframe id="JSPFrame" name="JSPFrame" src="" style="width: 100%;height: 300px"></iframe>
                </div>
                <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                    <iframe id="SettingFrame" name="SettingFrame" src="" style="width: 100%;height: 300px"></iframe>
                </div>
            </div>

        </div>
    </section><!-- End Resume Section -->
    @section('script')


        <script src="/assets/js/popover.min.js"></script>
        <script>
            function settingstab() {
                jQuery.ajax({
                    type: 'GET',
                    data: {
                        'blank': 1
                    },
                    url: '/user/settings/mules/runes/',
                    success: function (data) {
                        $('#setting').text('');
                        $('#setting').append(data);
                    }
                });
            };

            function makePopover(val) {
                $("[class*=fu_popover_default]").remove();
                $('#' + val + '_price').fu_popover({
                    content: 'Hello !',
                    width: '250px',
                    placement: 'left'
                });
                var server = '{{$id}}';
                $.ajax({
                    type: 'GET',
                    data: {
                        'code': val
                    },
                    url: '/user/mules/runes/' + server + '/edit',
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

            $('input[id=update]').keyup(function (e) {//"#update"
                e.preventDefault();
                var code = $(this).attr('datacode');
                var id = $(this).attr('dataid');
                var value = $(this).val();
                var csrf = '{{csrf_token()}}';
                var server = '{{$id}}';
                if (id != 0) {
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
                    url: '/user/mules/runes/' + server + '/store',
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

