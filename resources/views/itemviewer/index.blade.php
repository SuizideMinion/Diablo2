<x-app-layout>
    <section id="portfolio" class="portfolio section-show">
        <div class="container">

            <div class="section-title">
                <h2>Diablo 2</h2>
                <p>Unique Items</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-swor">Card</li>
                        <li data-filter=".filter-wand">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" style="position: relative; height: 864px;">

                <?php

                    foreach ($Uniques as $Unique) {

                        echo '<div class="col-lg-4 col-md-6 portfolio-item filter-app filter-';
                        echo $Unique->Base($Unique->code, 'type');
                    echo '" style="position: absolute; left: 0px; top: 0px;">
                    <div class="portfolio-wrap" style="text-align: center;transition: all ease-in-out 0.3s;display: flex;flex-direction: column;justify-content: center;align-items: center;">
                        <div class="img-fluid" style="height: 110%" alt="">';
            $imagecheck = $Unique->Data('invfile');
//            dd($imagecheck);
            if (isset( $imagecheck )) echo "<img src='items/" . $Unique->Data('invfile') . ".jpg'> <br>";
            else echo "<img src='items/" . $Unique->Base($Unique->code, 'invfile') . ".jpg'> <br>";
            echo $Unique->name." <br>";
            echo $Unique->Base($Unique->code, 'name')."<br>";

            $mindam = $Unique->Base($Unique->code, 'mindam');
            if(isset($mindam)) echo "1h DMG Base: " . $mindam . " - " . $Unique->Base($Unique->code, 'maxdam') . "<br>";

            $twohand = $Unique->Base($Unique->code, '2handmindam');
            if(isset($twohand)) echo "2h DMG Base: " . $twohand . " - " . $Unique->Base($Unique->code, '2handmaxdam') . "<br>";

            $speed = $Unique->Base($Unique->code, 'speed');
            if(isset($speed)) echo "IAS: " . $speed . "<br>";

            if($Unique->Base($Unique->code, 'nodurability') == "") echo "Dura: " . $Unique->Base($Unique->code, 'durability') . "<br>";

            $lvlreq = $Unique->Data('lvl req');
            if(isset($lvlreq)) echo "R Level: " . $lvlreq . "<br>";

            $qlvl = $Unique->Data('lvl');
            if( $Unique->Data('lvl') != "") echo "Q Level: " . $qlvl. "<br>";

            $prob1 = $Unique->Properties($Unique->Data('prop1'));
            if($Unique->Data('min1') != "") echo $prob1." ".($Unique->Data('min1') == $Unique->Data('max1') ? $Unique->Data('min1') : $Unique->Data('min1')." -".$Unique->Data('max1'))." ". ( str_contains( $Unique->Data('prop1'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min2') != "") echo $Unique->Data('prop2')." ".($Unique->Data('min2') == $Unique->Data('max2') ? $Unique->Data('min2') : $Unique->Data('min2')." - ".$Unique->Data('max2'))." ". ( str_contains( $Unique->Data('prop2'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min3') != "") echo $Unique->Data('prop3')." ".($Unique->Data('min3') == $Unique->Data('max3') ? $Unique->Data('min3') : $Unique->Data('min3')." - ".$Unique->Data('max3'))." ". ( str_contains( $Unique->Data('prop3'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min4') != "") echo $Unique->Data('prop4')." ".($Unique->Data('min4') == $Unique->Data('max4') ? $Unique->Data('min4') : $Unique->Data('min4')." - ".$Unique->Data('max4'))." ". ( str_contains( $Unique->Data('prop4'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min5') != "") echo $Unique->Data('prop5')." ".($Unique->Data('min5') == $Unique->Data('max5') ? $Unique->Data('min5') : $Unique->Data('min5')." - ".$Unique->Data('max5'))." ". ( str_contains( $Unique->Data('prop5'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min6') != "") echo $Unique->Data('prop6')." ".($Unique->Data('min6') == $Unique->Data('max6') ? $Unique->Data('min6') : $Unique->Data('min6')." - ".$Unique->Data('max6'))." ". ( str_contains( $Unique->Data('prop6'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min7') != "") echo $Unique->Data('prop7')." ".($Unique->Data('min7') == $Unique->Data('max7') ? $Unique->Data('min7') : $Unique->Data('min7')." - ".$Unique->Data('max7'))." ". ( str_contains( $Unique->Data('prop7'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min8') != "") echo $Unique->Data('prop8')." ".($Unique->Data('min8') == $Unique->Data('max8') ? $Unique->Data('min8') : $Unique->Data('min8')." - ".$Unique->Data('max8'))." ". ( str_contains( $Unique->Data('prop8'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min9') != "") echo $Unique->Data('prop9')." ".($Unique->Data('min9') == $Unique->Data('max9') ? $Unique->Data('min9') : $Unique->Data('min9')." - ".$Unique->Data('max9'))." ". ( str_contains( $Unique->Data('prop9'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min10') != "") echo $Unique->Data('prop10')." ".($Unique->Data('min10') == $Unique->Data('max10') ? $Unique->Data('min10') : $Unique->Data('min10')." - ".$Unique->Data('max10'))." ". ( str_contains( $Unique->Data('prop10'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min11') != "") echo $Unique->Data('prop11')." ".($Unique->Data('min11') == $Unique->Data('max11') ? $Unique->Data('min11') : $Unique->Data('min11')." - ".$Unique->Data('max11'))." ". ( str_contains( $Unique->Data('prop11'), '%') !== false ? "%" : "") ."<br>";
            if($Unique->Data('min12') != "") echo $Unique->Data('prop12')." ".($Unique->Data('min12') == $Unique->Data('max12') ? $Unique->Data('min12') : $Unique->Data('min12')." - ".$Unique->Data('max12'))." ". ( str_contains( $Unique->Data('prop12'), '%') !== false ? "%" : "") ."<br>";
    echo '
                        </div>
                    </div>
                </div>';
        }

                    ?>




            </div>

        </div>
    </section>
</x-app-layout>
