<!DOCTYPE html>
<html data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
     {{-- slide autoplay image --}}
     <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- link leaflet untuk menampilkan peta --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<link rel="stylesheet" href="leaflet-search/src/leaflet-search.css" />
<link rel="stylesheet" href="{{ asset('leaflet-compass-master/src/leaflet-compass.css') }}" />
     <link rel="stylesheet" href="leaflet-search/src/leaflet-search.css" />
     <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.0/dist/full.css" rel="stylesheet" type="text/css" />
     <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
     integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
     crossorigin=""></script>
     {{-- end --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <style>
        /* mengukur panjang lebarnya map */
        #map { height: 500px;
            width: 930px;
            margin-top:5px;  
            /* margin-left: 70px; */
            /* padding-top: 20px; */
        }
	.link-underline {
		border-bottom-width: 0;
		/* background-image: linear-gradient(transparent, transparent), linear-gradient(#fff, #fff); */
		background-size: 0 3px;
		background-position: 0 100%;
		background-repeat: no-repeat;
		transition: background-size .5s ease-in-out;
	}

	.link-underline-black {
		background-image: linear-gradient(transparent, transparent), linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255))
	}

	.link-underline:hover {
		background-size: 100% 3px;
		background-position: 0 100%
	}
    .wrapper{
  display:grid;
  height:100vh;
  place-items:center
    }
</style>
</head>
<body>
    <div>
        @include('layouts.navbar')
        <div class="pt-16">
            @yield('contents')
        </div>
    </div>
</body>
<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
</html>