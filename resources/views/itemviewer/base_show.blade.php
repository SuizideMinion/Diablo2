<x-app-layout>
    <section id="about" class="about section-show">
        <div class="about-me container">
            <div class="section-title"><h2>Diablo 2</h2>
                <p>{{ $id }}</p></div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach($baseItems as $baseItem)
                    @if ( $baseItem->itemLevel != 0 )
                    <li class="nav-item" role="presentation">
                        <button class="btn {{$baseItem->code == $id ? 'active':''}}"
                                id="pills-{{$baseItem->code}}-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-{{$baseItem->code}}" type="button" role="tab"
                                aria-controls="pills-{{$baseItem->code}}"
                                aria-selected="{{$baseItem->code == $id ? 'true':'false'}}" style="color: #18d26e;">

                            @if ( $baseItem->itemLevelN != false AND $baseItem->itemLevelN == $baseItem->code ) {!! Speak('base.item.viewer.normal_version', 'EN') !!}
                            : {!! Speak($baseItem->itemLevelN, 'EN') !!}<br> @endif
                            @if ( $baseItem->itemLevelA != false AND $baseItem->itemLevelA == $baseItem->code ) {!! Speak('base.item.viewer.expet_version', 'EN') !!}
                            : {!! Speak($baseItem->itemLevelA, 'EN') !!}<br> @endif
                            @if ( $baseItem->itemLevelH != false AND $baseItem->itemLevelH == $baseItem->code ) {!! Speak('base.item.viewer.elite_version', 'EN') !!}
                            : {!! Speak($baseItem->itemLevelH, 'EN') !!}<br> @endif

                        </button>
                    </li>
                    @endif

                @endforeach

{{--                    <li class="nav-item" role="presentation" style="float: right;">--}}
{{--                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>--}}
{{--                        </li>--}}
            </ul>

            <div class="tab-content" id="pills-tabContent">
                @foreach($baseItems as $baseItem)
                    <div class="tab-pane fade {{$baseItem->code == $id || $baseItem->itemLevel == 0 ? 'show active':''}}"
                         id="pills-{{$baseItem->code}}" role="tabpanel" aria-labelledby="pills-{{$baseItem->code}}-tab">
                        <div class="row">


                            <div class="col-lg-4" data-aos="fade-right"><img
                                    src="{{public_path('items/'.strtolower($baseItem->invfile).'.jpg')}}"
                                    style="float: right; max-width: 100%; max-height: 100%" class="img-fluid"
                                    alt=""></div>
                            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                                <h3>{!! Speak($baseItem->code, 'EN') !!}</h3>
                                <p class="fst-italic">
                                    @if($baseItem->itemLevel == 1) {!! Speak('base.item.viewer.normal_version', 'EN') !!}
                                    @elseif($baseItem->itemLevel == 2) {!! Speak('base.item.viewer.expet_version', 'EN') !!}
                                    @elseif($baseItem->itemLevel == 3) {!! Speak('base.item.viewer.elite_version', 'EN') !!}
                                    @endif
                                </p>
                                <div class="row">
                                    <ul>
                                        @if ( $baseItem->oneHandDamagemin != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ItemStats1l', 'EN') !!}</strong>
                                                <span>{{$baseItem->oneHandDamagemin}} - {{$baseItem->oneHandDamagemax}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->twoHandDamagemin != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ItemStats1n', 'EN') !!}</strong>
                                                <span>{{$baseItem->twoHandDamagemin}} - {{$baseItem->twoHandDamagemax}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->trowHandDamagemin != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ItemStats1l', 'EN') !!}</strong>
                                                <span>{{$baseItem->trowHandDamagemin}} - {{$baseItem->trowHandDamagemax}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->defensivemin != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ItemStats1h', 'EN') !!}</strong>
                                                <span>{{$baseItem->defensivemin}} - {{$baseItem->defensivemax}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->speed != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('StrSkill106', 'EN') !!}</strong>
                                                <span>{{$baseItem->speed}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->range != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('base.item.viewer.base_range', 'EN') !!}</strong>
                                                <span>{{$baseItem->range}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->durability != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ItemStats1d', 'EN') !!}</strong>
                                                <span>{{$baseItem->durability}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->strReq != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ItemStats1e', 'EN') !!}</strong>
                                                <span>{{$baseItem->strReq}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->dexReq != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ItemStats1f', 'EN') !!}</strong>
                                                <span>{{$baseItem->dexReq}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->levelreq != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ItemStats1p', 'EN') !!}</strong>
                                                <span>{{$baseItem->levelreq}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->level != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('base.item.viewer.quality_level', 'EN') !!}:</strong>
                                                <span>{{$baseItem->level}}</span>
                                            </li>
                                        @endif
                                        @if ( $baseItem->sockets != false)
                                            <li>
                                                <i class="bi bi-chevron-right"></i>
                                                <strong>{!! Speak('ModStre8c', 'EN') !!}:</strong>
                                                <span>{{$baseItem->sockets}}</span>
                                            </li>
                                        @endif
                                    </ul>
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


                                    <br>
                                </div>
                                <p></p>
                            </div>
                        </div>
                        <div class="counts container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="count-box"><i class="bi bi-emoji-smile"></i> <span
                                            data-purecounter-start="0"
                                            data-purecounter-end="232"
                                            data-purecounter-duration="100"
                                            class="purecounter">???</span>
                                        <p>Heave this item on Mule</p></div>
                                </div>
                                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                                    <div class="count-box"><i class="bi bi-journal-richtext"></i> <span
                                            data-purecounter-start="0"
                                            data-purecounter-end="521"
                                            data-purecounter-duration="0"
                                            class="purecounter">???</span>
                                        <p>Have this item in Holy Grail</p></div>
                                </div>
                                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                                    <div class="count-box"><i class="bi bi-headset"></i> <span
                                            data-purecounter-start="0"
                                            data-purecounter-end="1463"
                                            data-purecounter-duration="0"
                                            class="purecounter">???</span>
                                        <p>Comments to this Item</p></div>
                                </div>
                                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                                    <div class="count-box"><i class="bi bi-award"></i> <span
                                            data-purecounter-start="0"
                                            data-purecounter-end="24"
                                            data-purecounter-duration="0"
                                            class="purecounter">???</span>
                                        <p>Atm no Idea</p></div>
                                </div>
                            </div>
                        </div>
                        <div class="skills container">
                            <div class="section-title"><h2>Cubing</h2></div>
                            <div class="row skills-content">
                                <div class="col-lg-12">
                                    <div class="progress"><span class="skill">HTML <i class="val">-</i></span>
                                        Testtext
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
