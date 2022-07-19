<x-app-layout>
    <section id="portfolio" class="portfolio section-show">
        <div class="container">

            <div class="section-title">
                <h2>Diablo 2</h2>
                <p>Base Items</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <a href="/upload/string">{{\App\Models\Strings::count()}} Strings</a> <br>
                        <a href="/upload/unique">{{\App\Models\UniqueItems::count()}} Unique</a>  <br>
                        <a href="/upload/seti">{{\App\Models\SetItems::count()}} Set Items</a>  <br>
                        <a href="/upload/itemstatcost">{{\App\Models\ItemStatCost::count()}} Itemstatcost</a>  <br>
                        <a href="/upload/base/weapon">{{\App\Models\BaseItems::where('type', 'weapon')->count()}} Base: Weapons</a>  <br>
                        <a href="/upload/base/armor">{{\App\Models\BaseItems::where('type', 'armor')->count()}} Base: Armor</a> <br>
                        <a href="/upload/base/misc">{{\App\Models\BaseItems::where('type', 'misc')->count()}} Base: Misc </a>  <br>
                        <a href="/upload/gems">{{\App\Models\BaseItemsData::where('key', 'weaponMod1Code')->count()}} Base: Gems </a>  <br>
                        <a href="/upload/prop">{{\App\Models\Properties::count()}} PropNew </a>  <br>
                        <a href="/upload/propertiess">{{\App\Models\PropertiesString::count()}} PropString </a>  <br>
                        <a href="/upload/skills">{{\App\Models\Skill::where('desc', 'skills')->count()}} Skills </a>  <br>
                        <a href="/upload/skilldesc">{{\App\Models\Skill::where('desc', 'desc')->count()}} Skilldesc </a>  <br>
                    </ul>

                </div>
            </div>

            <div class="row portfolio-container" style="position: relative; height: 864px;">



            </div>

        </div>
    </section>
</x-app-layout>
