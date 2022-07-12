<x-app-layout>
    <section id="portfolio" class="portfolio section-show">
        <div class="container">

            <div class="section-title">
                <h2>Diablo 2</h2>
                <p>{!! Speak('base.item.viewer.base_items', 'EN') !!}</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach($grouped as $key => $Group)
                            @if ( $key != 'h2h')
                            <li data-filter=".filter-{{$key}}">{!! Speak($key, 'EN') !!}</li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="search-criteria" placeholder="Subject" required="">
                    </div>
                </div>
            </div>

            <div class="row portfolio-container" style="position: relative; height: 864px;">
                @foreach($UniqueItems as $UniqueItem)
                <div class="searchbox col-lg-4 col-md-6 portfolio-item filter-app filter-{{$UniqueItem['baseitem']->type}} filter-{{$UniqueItem['baseitem']->baseType}}" style="position: absolute; left: 0px; top: 0px;">
                    <div class="portfolio-wrap" style="text-align: center;transition: all ease-in-out 0.3s;display: flex;flex-direction: column;justify-content: center;align-items: center;">
                        <div class="img-fluid" style="height: 110%" alt="">
                            <a href="{{env('APP_URL') .'bases/' .$UniqueItem['baseitem']->code}}"> <img src='{{public_path('items/'.$UniqueItem['baseitem']->invfile.'.jpg')}}'> </a>
                            <br>
                            <span style="color: #ecd2a8;font-weight: bold;">{!! Speak($UniqueItem['uniqueItem']->index, 'EN') !!}</span> <br>
                            {!! Speak($UniqueItem['baseitem']->code, 'EN') !!}
                            @if($UniqueItem['baseitem']->itemLevel == 1) (N)
                            @elseif($UniqueItem['baseitem']->itemLevel == 2) (A)
                            @elseif($UniqueItem['baseitem']->itemLevel == 3) (H)
                            @endif
                            <br>
                            @if ( $UniqueItem['baseitem']->oneHandDamagemin != false) {!! Speak('ItemStats1l', 'EN') !!} {{$UniqueItem['baseitem']->oneHandDamagemin}} - {{$UniqueItem['baseitem']->oneHandDamagemax}}<br> @endif
                            @if ( $UniqueItem['baseitem']->twoHandDamagemin != false) {!! Speak('ItemStats1m', 'EN') !!} {{$UniqueItem['baseitem']->twoHandDamagemin}} - {{$UniqueItem['baseitem']->twoHandDamagemax}}<br> @endif
                            @if ( $UniqueItem['baseitem']->trowHandDamagemin != false) {!! Speak('ItemStats1n', 'EN') !!} {{$UniqueItem['baseitem']->trowHandDamagemin}} - {{$UniqueItem['baseitem']->trowHandDamagemax}}<br> @endif
                            @if ( $UniqueItem['baseitem']->defensivemin != false) {!! Speak('ItemStats1h', 'EN') !!} {{$UniqueItem['baseitem']->defensivemin}} - {{$UniqueItem['baseitem']->defensivemax}}<br> @endif
                            @if ( $UniqueItem['baseitem']->speed != false) {!! Speak('StrSkill106', 'EN') !!} {{$UniqueItem['baseitem']->speed}}<br> @endif
{{--                            @if ( $UniqueItem['baseitem']->speedString != false) Base Speed: {{$UniqueItem['baseitem']->speedString}}<br> @endif--}}
                            @if ( $UniqueItem['baseitem']->range != false) {!! Speak('base.item.viewer.base_range', 'EN') !!}: {{$UniqueItem['baseitem']->range}}<br> @endif
                            @if ( $UniqueItem['baseitem']->durability != false) {!! Speak('ItemStats1d', 'EN') !!} {{$UniqueItem['baseitem']->durability}}<br> @endif
                            @if ( $UniqueItem['baseitem']->strReq != false) {!! Speak('ItemStats1e', 'EN') !!} {{$UniqueItem['baseitem']->strReq}}<br> @endif
                            @if ( $UniqueItem['baseitem']->dexReq != false) {!! Speak('ItemStats1f', 'EN') !!} {{$UniqueItem['baseitem']->dexReq}}<br> @endif
                            @if ( $UniqueItem['uniqueItem']->lvlreq != false) {!! Speak('ItemStats1p', 'EN') !!} {{$UniqueItem['uniqueItem']->lvlreq}}<br> @endif
                            @if ( $UniqueItem['uniqueItem']->lvl != false) {!! Speak('base.item.viewer.quality_level', 'EN') !!}: {{$UniqueItem['uniqueItem']->lvl}}<br> @endif
{{--                            @if ( $UniqueItem['baseitem']->sockets != false) {!! Speak('ModStre8c', 'EN') !!}: {{$UniqueItem['baseitem']->sockets}}<br> @endif--}}
                            <br>
                            <span style="color: #84b7ff;">
                                @if( isset($UniqueItem['uniqueItem']->prop1) ){!! pSpeak($UniqueItem['uniqueItem']->prop1, $UniqueItem['uniqueItem']->par1, $UniqueItem['uniqueItem']->min1, $UniqueItem['uniqueItem']->max1, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop2) ){!! pSpeak($UniqueItem['uniqueItem']->prop2, $UniqueItem['uniqueItem']->par2, $UniqueItem['uniqueItem']->min2, $UniqueItem['uniqueItem']->max2, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop3) ){!! pSpeak($UniqueItem['uniqueItem']->prop3, $UniqueItem['uniqueItem']->par3, $UniqueItem['uniqueItem']->min3, $UniqueItem['uniqueItem']->max3, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop4) ){!! pSpeak($UniqueItem['uniqueItem']->prop4, $UniqueItem['uniqueItem']->par4, $UniqueItem['uniqueItem']->min4, $UniqueItem['uniqueItem']->max4, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop5) ){!! pSpeak($UniqueItem['uniqueItem']->prop5, $UniqueItem['uniqueItem']->par5, $UniqueItem['uniqueItem']->min5, $UniqueItem['uniqueItem']->max5, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop6) ){!! pSpeak($UniqueItem['uniqueItem']->prop6, $UniqueItem['uniqueItem']->par6, $UniqueItem['uniqueItem']->min6, $UniqueItem['uniqueItem']->max6, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop7) ){!! pSpeak($UniqueItem['uniqueItem']->prop7, $UniqueItem['uniqueItem']->par7, $UniqueItem['uniqueItem']->min7, $UniqueItem['uniqueItem']->max7, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop8) ){!! pSpeak($UniqueItem['uniqueItem']->prop8, $UniqueItem['uniqueItem']->par8, $UniqueItem['uniqueItem']->min8, $UniqueItem['uniqueItem']->max8, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop9) ){!! pSpeak($UniqueItem['uniqueItem']->prop9, $UniqueItem['uniqueItem']->par9, $UniqueItem['uniqueItem']->min9, $UniqueItem['uniqueItem']->max9, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop10) ){!! pSpeak($UniqueItem['uniqueItem']->prop10, $UniqueItem['uniqueItem']->par10, $UniqueItem['uniqueItem']->min10, $UniqueItem['uniqueItem']->max10, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop11) ){!! pSpeak($UniqueItem['uniqueItem']->prop11, $UniqueItem['uniqueItem']->par11, $UniqueItem['uniqueItem']->min11, $UniqueItem['uniqueItem']->max11, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                                @if( isset($UniqueItem['uniqueItem']->prop12) ){!! pSpeak($UniqueItem['uniqueItem']->prop12, $UniqueItem['uniqueItem']->par12, $UniqueItem['uniqueItem']->min12, $UniqueItem['uniqueItem']->max12, "EN", $UniqueItem['baseitem']->item_id) !!} @endif
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
</x-app-layout>
