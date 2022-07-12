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
                        <a href="http://localhost/dashboard/public/upload/string">{{\App\Models\Strings::count()}} Strings</a> |
                        <a href="http://localhost/dashboard/public/upload/unique">{{\App\Models\UniqueItems::count()}} Unique</a> |
                        <a href="http://localhost/dashboard/public/upload/seti">{{\App\Models\SetItems::count()}} Set Items</a> |
                        <a href="http://localhost/dashboard/public/upload/properties">{{\App\Models\Properties::count()}} Properties</a> |
                        <a href="http://localhost/dashboard/public/upload/itemstatcost">{{\App\Models\ItemStatCost::count()}} Itemstatcost</a> |
                        <a href="http://localhost/dashboard/public/upload/base/weapon">{{\App\Models\BaseItems::where('type', 'weapon')->count()}} Base: Weapons</a> |
                        <a href="http://localhost/dashboard/public/upload/base/armor">{{\App\Models\BaseItems::where('type', 'armor')->count()}} Base: Armor</a> |
                        <a href="http://localhost/dashboard/public/upload/base/misc">{{\App\Models\BaseItems::where('type', 'misc')->count()}} Base: Misc </a> |
                        <a href="http://localhost/dashboard/public/upload/gems">{{\App\Models\BaseItemsData::where('key', 'weaponMod1Code')->count()}} Base: Gems </a> |
                        <a href="http://localhost/dashboard/public/upload/prop">{{\App\Models\Properties::count()}} PropNew </a> |
                        <a href="http://localhost/dashboard/public/upload/propertiess">{{\App\Models\PropertiesString::count()}} PropString </a> |
                    </ul>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="search-criteria" placeholder="Subject" required="">
                    </div>
                </div>
            </div>

            <div class="row portfolio-container" style="position: relative; height: 864px;">



            </div>

        </div>
    </section>
</x-app-layout>
