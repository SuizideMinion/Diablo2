<x-app-layout>

    <section id="create" class="contact section-show">
        <div class="container">

            <div class="section-title">
                <h2>News</h2>
                <p>Create New News</p>
            </div>

            <form action="{{route('news.store')}}" method="post" role="form" class="php-email-form mt-4">
                @csrf
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{old('title')}}" required="">
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="text" rows="5" placeholder="Text" required="">{{old('text')}}</textarea>
                </div>
                <div class="form-group form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="type" value="1" style="padding: 0px 0px;" required="">
                    <label class="form-check-label" for="1">News for D2Mul.es</label>
                </div>
                <div class="form-group form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="type" value="2" style="padding: 0px 0px;" required="">
                    <label class="form-check-label" for="2">News for Diablo 2</label>
                </div>
                <div class="text-center"><button type="submit">Send News</button></div>
            </form>

        </div>
    </section>

</x-app-layout>
