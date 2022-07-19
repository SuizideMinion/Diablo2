<x-app-layout>

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume section-show">
        <div class="container">

            <div class="section-title">
                <div style="float:left"><h2>News</h2></div>
                @if(isset(auth()->user()->id) ? auth()->user()->hasAdmin() : false)
                <div style="float:right">
                    <a href="{{route('news.create')}}">New News</a>
                </div>
                @endcan
                {{--                <p>News from D2Mul.es</p>--}}
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <h3 class="resume-title">News from D2Mul.es</h3>
                    @foreach($NewsSite as $Post)
                    <div class="resume-item">
                        <h4>{{$Post->title}}</h4>
                        <h5>{{date('d-m-Y', strtotime($Post->created_at))}}</h5>
{{--                        <p><em>Rochester Institute of Technology, Rochester, NY</em></p>--}}
                        <p>{{$Post->text}}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <h3 class="resume-title">Diablo 2 News</h3>
                    @foreach($NewsDiablo as $Post)
                        <div class="resume-item">
                            <h4>{{$Post->title}}</h4>
                            <h5>{{date('d-m-Y', strtotime($Post->created_at))}}</h5>
                            <p>{{$Post->text}}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section><!-- End Resume Section -->

</x-app-layout>
