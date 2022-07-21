<x-app-layout>
    <section id="services" class="services section-show">
        <div class="container">
            <div class="section-title"><h2>Itemviewer</h2>
                <p>Base Items</p></div>
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box" style="width: 100%;cursor: pointer;" onclick="location.href='/baseitems/weapon'">
                        <div class="icon"><img src="/uploads/crystal_sword.png" width="120px"></div>
                        <br><h4>Weapons</h4>
{{--                        <p>test usw</p>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box" style="width: 100%;cursor: pointer;" onclick="location.href='/baseitems/armor'">
                        <div class="icon"><img src="/uploads/light_plate.png" width="120px"></div>
                        <br><h4>Armors</h4>
{{--                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box" style="width: 100%;cursor: pointer;" onclick="location.href='/baseitems/misc'">
                        <div class="icon"><img src="/uploads/token_of_absolution.png" width="120px"></div>
                        <br><h4>Misc</h4>
{{--                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
