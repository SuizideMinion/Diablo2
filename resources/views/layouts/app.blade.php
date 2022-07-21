<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>D2Mul.es</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
{{--    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>

<header id="header" class="header-top" style="display: block">
    <div class="container">

        <h1><a href="/">D2Mul.es</a></h1>
        <h2>Diablo 2 <span>Mule</span> Helper</h2>

        <nav id="navbar" class="navbar nav">
            <ul>
                <li><a class="nav-link" href="/">Home</a></li>
                <li><a class="nav-link" href="/bases">Bases</a></li>
                <li><a class="nav-link" href="/uniques">Uniques</a></li>
                @auth
                    <li><a class="nav-link" href="/user/mules/runes/{{
                        ( \App\Models\UserData::where('user_id', auth()->user()->id)->where('key', 'user.mules.runes.show.last')->first() != false ? \App\Models\UserData::where('user_id', auth()->user()->id)->where('key', 'user.mules.runes.show.last')->first()->value : 'scl' )
                        }}">Misc Mule</a></li>
                    <li><a class="nav-link" href="/signout">Logout</a></li>
                @else

                    <li><a class="nav-link" href="/login">Login</a></li>
                    <li><a class="nav-link" href="/registration">Register</a></li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        <div class="social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

    </div>
</header>
{{ $slot }}

<!-- Vendor JS Files -->
{{--<script src="/assets/vendor/purecounter/purecounter.js"></script>--}}
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
{{--<script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>--}}
{{--<script src="/assets/vendor/php-email-form/validate.js"></script>--}}
<script src="/assets/js/jquery1.7.1.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script>
</script>
@section('script')
@show
</body>

</html>
