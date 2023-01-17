@extends('layouts.main')
@section('contents')
    <div class="flex flex-row">
        <div class="flex flex-wrap">
            <form class="flex justify-end" action="/maps">
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
            <div class="flex flex-row" >
                <div id="lokasi" class="flex flex-col ml-2 w-96">
                    @if(count($masjid) =='null')
                    <div class="mt-2 h-50 w-96 border-2 border-black rounded-lg ">
                    <p class="font-semibold">Tidak Ada Masjid atau Dayah Yang Di Temukan</p>
                    </div>
                    @else
                    @foreach($masjid as $item)
                        <div class="h-30 border-2 border-gray-400 rounded-lg mb-2">
                            <img class="w-full object-cover px-2 py-2" style="min-width: 300px !important;"
                                src="{{ asset('/storage/'. $item->image) }}">
                            <h2 class="text-2sm font-bold ml-3">{{ $item->nama }} </h2>
                            <div class="flex ml-2">
                            <span class="ml-2 text-sm">{{ $item->desa }} , Kec. {{ $item->kecamatan }}</span>
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
        @endif
    </div>
    <div class="order-first md:order-last w-full md:w-full md:ml-6">
        <div id="map"></div>
    </div>
    </div>
<script src="{{ asset('leaflet-compass-master/src/leaflet-compass.js')}}"></script>
<script type="text/javascript" src="js/kec.js"> </script>
<script>
    let latLng = [5.1122556773, 96.6373723974];
    var map = L.map('map').setView(latLng, 11);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);
    var smallIcon = new L.Icon({
        iconSize: [30, 30],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: 'icon/icon.png'
    });
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const name = urlParams.get('search')
    let query = ''
    if (name != null) {
        query = `?search=${name}`
    }
    // console.log(query);
    // menampilkan kompas
    var comp = new L.Control.Compass({autoActive: true, showDigit:true});
    map.addControl(comp);
    
    $.ajax({
        url: 'http://127.0.0.1:8000/json' + query,
        success: function (response) {
            const myLayer = L.geoJSON(response, {
                onEachFeature: function (feature, layer) {
                    let coord = feature.geometry.coordinates;
                    layer.bindPopup(
                        `<h1 class="text-sm"><b> <center> ${feature.properties.name}</center></b> ${feature.properties.desa}, Kec. ${feature.properties.kecamatan}</center></h1>`
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
            }).addTo(map)
            L.control.search({
                layer: myLayer,
                initial: false,
                propertyName: 'name',
                buildTip: function (text, val) {
                    return '<a href="#" class="">' + text + '<b>'
                    '</b></a>';
                }
            }).addTo(map);
        }
    })
// Menampilkan Kecamatan
var kecamatan = L.geoJSON(kecamatan, {
    style: function(feature) {
        switch (feature.properties.KECAMATAN) {
            case 'Kecamatan Gandapura': return {color: "#00FF00"};
            case 'Kecamatan Jangka': return {color: "green"};
            case 'Kecamatan Jeumpa': return {color: "grey"};
            case 'Kecamatan Jeunieb': return {color: "BLUE"};
            case 'Kecamatan Juli': return {color: "#32CD32"};
            case 'Kecamatan Kota Juang': return {color: "#ADFF2F"};
            case 'Kecamatan Kuala': return {color: "black"};
            case 'Kecamatan Kuta Blang': return {color: "#8b0000"};
            case 'Kecamatan Makmur': return {color: "#00008b"};
            case 'Kecamatan Pandrah': return {color: "#9400D3"};
            case 'Kecamatan Peudada': return {color: "#2F4F4F"};
            case 'Kecamatan Peulimbang': return {color: "#4B0082"};
            case 'Kecamatan Peusangan': return {color: "#00FF00"};
            case 'Kecamatan Peusangan Selatan': return {color: "#808000"};
            case 'Kecamatan Peusangan Siblah Krueng': return {color: "cyan"};
            case 'Kecamatan Samalanga': return {color: "red"};
            case 'Kecamatan Simpang Mamplang': return {color: "yellow"};
        }
    }
}).addTo(map);

    function getDetailLokasi(id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/detail_lokasi/' + id,
            success: function (response) {
                const lokasi = document.querySelector("#lokasi");
                lokasi.innerHTML = ` <div class="h-30 border-2 border-gray-400 rounded-lg mb-2">
                            <img class="w-full object-cover px-2 py-2" style="min-width: 300px !important;"
                                src="/storage/${ response.image }">
                            <h2 class="text-2sm font-bold ml-3">${response.nama}</h2>
                            <div class="flex ml-2">
                            <span class="ml-2 text-sm">Desa : ${response.desa} , Kec. ${response.desa}</span>
                            </div>
                            <div class="flex ml-2">
                               <span class="text-sm ml-2"> Alamat Lengkap : ${response.alamat}</span>
                            </div>
                                    <div class="stat pt-0 mt-2 ml-0">
                                        <div class="flex justify-end">
                                        <!-- The button to open modal -->
                                        <label data-id="${response.id}" for="my-modal-3"
                                            class=" text-yellow-500 border border-yellow-500 hover:bg-yellow-500 hover:text-white active:bg-yellow-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 modal-button mr-1 btn-voting">Voting</label>
                                        <button
                                            class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button"> <a href="/detail/${response.id}">Detail</a></button>
                                    </div>
                        </div>
                        </div>`
                                }
                            })
                }

</script>
@endsection
