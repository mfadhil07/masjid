<!DOCTYPE html>
<html data-theme="light">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/app.css">
 {{-- slide autoplay image --}}
 <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $title }}</title>
{{-- link leaflet untuk menampilkan peta --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
 integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
 crossorigin=""/>
 {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" /> --}}
<link rel="stylesheet" href="{{ asset('leaflet-compass-master/src/leaflet-compass.css') }}" />
 <link rel="stylesheet" href="leaflet-search/src/leaflet-search.css" />
 <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.0/dist/full.css" rel="stylesheet" type="text/css" />
 <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
 integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
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
    #mapid {
            height: 580px;
            width: 100%;
        }
    .paginate-text p {
        width: 24rem;
        margin: ;
        margin-left: 2rem;
    }
</style>
<title> {{ $title }}</title>
</head>

<body>
    <section class="flex flex-row">
        <div class="p-4 flex flex-row items-center justify-between">
            <a href="/" class="text-2xl font-bold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">WEBGIS</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
        <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'home' ? 'active: bg-white' : ' ' }}" href="/"> <span class="link-underline link-underline-black text-black">Home</span> </a>
        <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'maps' ? 'active: bg-white' : ' ' }}" href="/maps"> <span class="link-underline link-underline-black text-black">Maps</span> </a>
        <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'info' ? 'active: bg-white' : ' ' }}" href="/info"> <span class="link-underline link-underline-black text-black">Info Masjid</span></a>
        <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'about' ? 'active: bg-white' : ' ' }}" href="/about"> <span class="link-underline link-underline-black text-black">About</span></a>
    </section>
    <div class="flex flex-row">
        <div class="flex flex-wrap">
            <form class="flex justify-end" action="/tes">
                <div class="ml-36 flex mb-16 md:w-100 lg:w-1/2 ">
                    <div class="absolute border-2 w-60 rounded-btn mt-1">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-1 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 ml-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="search" name="search"
                            class="block p-4 pl-10 w-full items-end text-sm text-gray-100 bg-gray-300 rounded-lg border border-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-100 dark:border-gray-700 dark:placeholder-gray-400 dark:text-black dark:focus:ring-green-500 dark:focus:border-green-500"
                            placeholder="Search" required value="{{ request('search') }}">
                        <div class="pl-10">
                            <button type="submit"
                                class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-[#0ea5e9] dark:hover:bg-[#075985] dark:focus:ring-green-800">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="flex flex-col md:flex-row lg:w-full mt-1">
        <div class="order-last md:order-first w-100 md:w-1/3">
            <div class="flex flex-row">
                <div id="lokasi" class="flex flex-col ml-2 w-96">
                    @foreach($masjid as $item)
                        <div class="h-30 border-2 border-gray-400 rounded-lg mb-2">
                            <img class="w-full object-cover px-2 py-2" style="min-width: 300px !important;"
                                src="{{ asset('/storage/'. $item->image) }}">
                            <h2 class="text-2sm font-bold ml-3">{{ $item->nama }} </h2>
                            <div class="flex ml-2">
                            <span class="ml-2 text-sm">Desa : {{ $item->desa }} , Kec. {{ $item->kecamatan }}</span>
                            </div>
                            <div class="flex ml-2">
                               <span class="text-sm ml-2"> Alamat Lengkap : {{ $item->alamat }}</span>
                            </div>
                                    <div class="stat pt-0 mt-2 ml-0">
                                        <div class="flex justify-end">
                                        <!-- The button to open modal -->
                                        <label data-id="{{ $item->id }}" for="my-modal-3"
                                            class=" text-yellow-500 border border-yellow-500 hover:bg-yellow-500 hover:text-white active:bg-yellow-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 modal-button mr-1 btn-voting">Voting</label>
                                        <button
                                            class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button"> <a href="/detail/{{ $item->id }}">Detail</a></button>
                                    </div>
                        </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    <div class="order-first md:order-last w-full md:w-full md:ml-6">
        <div id="mapid"></div>
    </div>
    </div>
</body>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script src="{{ asset('leaflet-compass-master/src/leaflet-compass.js')}}"></script>
<script type="text/javascript" src="js/kec.js"> </script>
<script type="text/javascript">

    let latLng = [5.1122556773, 96.6373723974];
    var mymap = L.map('mapid').setView(latLng, 10);

    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Leaflet</a>',
            id: 'mapbox/streets-v11',
        }).addTo(mymap);
    var smallIcon = new L.Icon({
        iconSize: [30, 30],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: 'icon/icon.png'
    });
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const nama = urlParams.get('search')
    let query = ''
    if (nama != null) {
        query = `?search=${nama}`
    }

    // console.log(query);
 //compass
 var comp = new L.Control.Compass({autoActive: true, showDigit:true});
    mymap.addControl(comp);
    
    $.ajax({
        url: 'http://127.0.0.1:8000/json' + query,
        success: function (response) {
            const myLayer = L.geoJSON(response, {
                onEachFeature: function (feature, layer) {
                    let coord = feature.geometry.coordinates;
                    layer.bindPopup(
                        `<h1 class="text-sm"><b> <center>  ${feature.properties.name}</center></b><> Kec.  ${feature.properties.kecamatan} , Desa ${feature.properties.desa}</h1>`
                    )
                },
                pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {
                        icon: smallIcon
                    });
                },

            }).on('click', function (e) {
                const id_lokasi = e.layer.feature.properties.id;
                getDetailLokasi(id_lokasi)
                $('.paginate-text').addClass('hidden')
            }).addTo(mymap)
            // control Search
            L.control.search({
                layer: myLayer,
                initial: false,
                propertyName: 'name',
                buildTip: function (text, val) {
                    return '<a href="#" class="">' + text + '<b>'
                    '</b></a>';
                }
            }).addTo(mymap);
        }
    })

    let control = L.Routing.control({
        waypoints: [
            latLng
        ],
        lineOptions: {
      styles: [{color: 'blue', opacity: 1, weight: 5}]
   }
    }).addTo(mymap);

    $(document).on("click", ".keSini", function () {
        // Let latlng = [$(this).data('lat'), $(this).data('lng')];
        const lat = $(this).data('lat')
        const long = $(this).data('lng')
        const latlng = [lat, long]
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latlng);
    })

//get Location
$(document).on('click', '#btn-getloc', function(e) {
    e.preventDefault()
    if (control != null) {
            mymap.removeControl(control);
            control = null;
    }
    getLocation()
})
    function getDetailLokasi(id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/detail_lokasi/' + id,
            success: function (response) {
                const lokasi = document.querySelector("#lokasi");
                lokasi.innerHTML = ` <div class="mt-2 h-30 border-2 border-gray-400 rounded-lg pr-2" style="width: 350px;">
    <img style="width: 700px !important;" class="min-h-72 object-cover px-2 py-2 ml-2" src="/storage/${ response.img }">
    <h2 class="text-2sm font-bold mt-1 ml-2"> ${response.nama} </h2>

    <div class="flex ml-2">
        <span class="ml-1 text-sm"> Kecamatan ${response.kecamatan}, Desa ${response.desa} </span>
    </div>
    <div class="flex  ml-2">
        <span class="ml-1  text-sm text-center"> Buka : ${response.alamat} WIB</span>
    </div>
   

    <div class="stat mt-0 ">
                            <div class="flex justify-end">
                                <!-- The button to open modal -->
                                <label data-id="${response.id}" for="my-modal-3"
                                    class=" text-yellow-500 border border-yellow-500 hover:bg-yellow-500 hover:text-white active:bg-yellow-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 modal-button mr-1 btn-voting">Voting</label>
                                <button
                                    class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button"> <a href="/detail/${response.id}">Detail</a></button>
                                    <button data-lat="${ response.latitude }" data-long=${response.longitude}
                                    class="text-gray-700 border btn-rute border-gray-700 hover:bg-gray-700 hover:text-white active:bg-gray-700 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button">Rute</></button>
                            </div>
                        </div>
        `
            }
        })
    }
</script>

</html>