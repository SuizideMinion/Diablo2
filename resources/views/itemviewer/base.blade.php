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
                @foreach($baseItems as $baseItem)
                <div class="searchbox col-lg-4 col-md-6 portfolio-item filter-app filter-{{$baseItem->type}} filter-{{$baseItem->baseType}}" style="position: absolute; left: 0px; top: 0px;">
                    <div class="portfolio-wrap" style="text-align: center;transition: all ease-in-out 0.3s;display: flex;flex-direction: column;justify-content: center;align-items: center;">
                        <div class="img-fluid" style="height: 110%" alt="">
                            <a href="{{env('APP_URL') .'bases/' .$baseItem->code}}"> <img src='{{public_path('items/'.$baseItem->invfile.'.jpg')}}'> </a>
                            <br>
                            {!! Speak($baseItem->code, 'EN') !!}
                            @if($baseItem->itemLevel == 1) (N)
                            @elseif($baseItem->itemLevel == 2) (A)
                            @elseif($baseItem->itemLevel == 3) (H)
                            @endif
                            <br>
                            @if ( $baseItem->oneHandDamagemin != false) {!! Speak('ItemStats1l', 'EN') !!} {{$baseItem->oneHandDamagemin}} - {{$baseItem->oneHandDamagemax}}<br> @endif
                            @if ( $baseItem->twoHandDamagemin != false) {!! Speak('ItemStats1m', 'EN') !!} {{$baseItem->twoHandDamagemin}} - {{$baseItem->twoHandDamagemax}}<br> @endif
                            @if ( $baseItem->trowHandDamagemin != false) {!! Speak('ItemStats1n', 'EN') !!} {{$baseItem->trowHandDamagemin}} - {{$baseItem->trowHandDamagemax}}<br> @endif
                            @if ( $baseItem->defensivemin != false) {!! Speak('ItemStats1h', 'EN') !!} {{$baseItem->defensivemin}} - {{$baseItem->defensivemax}}<br> @endif
                            @if ( $baseItem->speed != false) {!! Speak('StrSkill106', 'EN') !!} {{$baseItem->speed}}<br> @endif
{{--                            @if ( $baseItem->speedString != false) Base Speed: {{$baseItem->speedString}}<br> @endif--}}
                            @if ( $baseItem->range != false) {!! Speak('base.item.viewer.base_range', 'EN') !!}: {{$baseItem->range}}<br> @endif
                            @if ( $baseItem->durability != false) {!! Speak('ItemStats1d', 'EN') !!} {{$baseItem->durability}}<br> @endif
                            @if ( $baseItem->strReq != false) {!! Speak('ItemStats1e', 'EN') !!} {{$baseItem->strReq}}<br> @endif
                            @if ( $baseItem->dexReq != false) {!! Speak('ItemStats1f', 'EN') !!} {{$baseItem->dexReq}}<br> @endif
                            @if ( $baseItem->levelreq != false) {!! Speak('ItemStats1p', 'EN') !!} {{$baseItem->levelreq}}<br> @endif
                            @if ( $baseItem->level != false) {!! Speak('base.item.viewer.quality_level', 'EN') !!}: {{$baseItem->level}}<br> @endif
                            @if ( $baseItem->sockets != false) {!! Speak('ModStre8c', 'EN') !!}: {{$baseItem->sockets}}<br> @endif
                            @if($baseItem->itemLevel != 0)
                                <br>
                                @if ( $baseItem->itemLevelN != false AND $baseItem->itemLevel != 1 ) {!! Speak('base.item.viewer.normal_version', 'EN') !!}: {!! Speak($baseItem->itemLevelN, 'EN') !!}<br> @endif
                                @if ( $baseItem->itemLevelA != false AND $baseItem->itemLevel != 2 ) {!! Speak('base.item.viewer.expet_version', 'EN') !!}: {!! Speak($baseItem->itemLevelA, 'EN') !!}<br> @endif
                                @if ( $baseItem->itemLevelH != false AND $baseItem->itemLevel != 3 ) {!! Speak('base.item.viewer.elite_version', 'EN') !!}: {!! Speak($baseItem->itemLevelH, 'EN') !!}<br> @endif
                            @endif
                            <br>
                            @if( isset($baseItem->weaponMod1Code) ){!! pSpeak($baseItem->weaponMod1Code, $baseItem->weaponMod1Param, $baseItem->weaponMod1Min, $baseItem->weaponMod1Max) !!} @endif
                            @if( isset($baseItem->weaponMod2Code) ){!! pSpeak($baseItem->weaponMod2Code, $baseItem->weaponMod2Param, $baseItem->weaponMod2Min, $baseItem->weaponMod2Max) !!} @endif
                            @if( isset($baseItem->weaponMod3Code) ){!! pSpeak($baseItem->weaponMod3Code, $baseItem->weaponMod3Param, $baseItem->weaponMod3Min, $baseItem->weaponMod3Max) !!} @endif
                            @if( isset($baseItem->helmMod1Code) ){!! pSpeak($baseItem->helmMod1Code, $baseItem->helmMod1Param, $baseItem->helmMod1Min, $baseItem->helmMod1Max) !!} @endif
                            @if( isset($baseItem->helmMod2Code) ){!! pSpeak($baseItem->helmMod2Code, $baseItem->helmMod2Param, $baseItem->helmMod2Min, $baseItem->helmMod2Max) !!} @endif
                            @if( isset($baseItem->helmMod3Code) ){!! pSpeak($baseItem->helmMod3Code, $baseItem->helmMod3Param, $baseItem->helmMod3Min, $baseItem->helmMod3Max) !!} @endif
                            @if( isset($baseItem->shieldMod1Code) ){!! pSpeak($baseItem->shieldMod1Code, $baseItem->shieldMod1Param, $baseItem->shieldMod1Min, $baseItem->shieldMod1Max) !!} @endif
                            @if( isset($baseItem->shieldMod2Code) ){!! pSpeak($baseItem->shieldMod2Code, $baseItem->shieldMod2Param, $baseItem->shieldMod2Min, $baseItem->shieldMod2Max) !!} @endif
                            @if( isset($baseItem->shieldMod3Code) ){!! pSpeak($baseItem->shieldMod3Code, $baseItem->shieldMod3Param, $baseItem->shieldMod3Min, $baseItem->shieldMod3Max) !!} @endif

                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
</x-app-layout>
