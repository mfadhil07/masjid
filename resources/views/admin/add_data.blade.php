<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.0/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <link rel="stylesheet" href="leaflet-search/src/leaflet-search.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="leaflet-routing/dist/leaflet-routing-machine.js"></script>
    <style>
        #mapid {
            height: 500px;
            width: 100%;
        }
    </style>
    <title> {{ $title }}</title>
</head>
<h1 class="text-2xl font-semibold font-sans ml-5 mt-4">Tambah Data Masjid atau Dayah </h1>
<div class="mt-4">
    <a href="/masjid" class="ml-28">
        <button class="btn btn-sm btn-outline btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
            </svg>
            <span class="ml-1">Back</span>
        </button>
    </a>
</div>
@if(session()->has('pesan'))
<div class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-100">
    <div class="flex items-center justify-center w-12 bg-emerald-500">
        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
        </svg>
    </div>

    <div class="px-4 py-2 -mx-3">
        <div class="mx-3">
            {{-- <span class="font-semibold text-emerald-500 dark:text-emerald-400">Sucesss</span> --}}
            <p class="text-sm text-gray-100 dark:text-gray-100">{{ session('pesan') }}</p>
        </div>
    </div>
</div>
@endif
<div class="grid grid-cols-2 gap-4">
    <div class="ml-10">
        <form action="/masjid" method="post" enctype="multipart/form-data" class="ml-10">
        @csrf
            <div class="ml-10 mt-4">
                <p class="mb-1 ml-2 font-bold text-sm"> Nama Masjid atau Dayah<span style="color:red"> &#x26B9;</span></p>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Nama Masjid atau Dayah" name="nama" id="nama"  value={{ old('nama') }}>
                    @error('nama')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
            </div>
            <div class="md:grid-cols-1 ml-10 ">
                <label class="label ">
                    <span class="label-text ml-2 font-bold">Kecamatan <span style="color:red"> &#x26B9;</span></span>
                </label>
                <select name="kecamatan" id="kecamatan" class="select max-w-xs select-accent w-80">
                    <option value=""> Pilih Kecamatan</option>
                    <option value="Gandapura"> Gandapura</option>
                    <option value="Jangka"> Jangka </option>
                    <option value="Jeumpa"> Jeumpa</option>
                    <option value="Jeunieb"> Jeunieb </option>
                    <option value="Juli"> Juli</option>
                    <option value="Kota Juang"> Kota Juang</option>
                    <option value="Kuala"> Kuala</option>
                    <option value="Kuta Blang"> Kuta Blang </option>
                    <option value="Pandrah">  Pandrah</option>
                    <option value="Peulimbang"> Peulimbang</option>
                    <option value="Peusangan"> Peusangan</option>
                    <option value="Peusangan Selatan"> Peusangan Selatan </option>
                    <option value="Peusangan Siblah Krueng"> Peusangan Siblah Krueng </option>
                    <option value="Samalanga"> Samalanga </option>
                    <option value="Simpang Mamplang"> Simpang Mamplang </option>
                </select>
                @error('kecamatan')
                    <div>
                        <label class="text-red-700">{{ $message }}</label>
                    </div>
                @enderror
            </div>
            <div class="ml-10 mt-4">
                <p class="mb-1 ml-2 font-bold text-sm">Desa<span style="color:red"> &#x26B9;</span></p>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Desa" name="desa" id="desa"  value={{ old('desa') }}>
                    @error('desa')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
            </div>
            <div class="ml-10 mt-4">
                <p class="mb-1 ml-2 font-bold text-sm">Alamat Lengkap<span style="color:red"> &#x26B9;</span></p>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Alamat Lengkap" name="alamat" id="alamat"  value={{ old('alamat') }}>
                    @error('alamat')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
            </div>
            <div class="ml-10 mt-4">
                <p class="mb-1 ml-2 font-bold text-sm">No HP <span style="color:red"> &#x26B9;</span> </p>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="No HP" name="no_hp" id="no_hp"  value={{ old('no_hp') }}>
                    @error('no_hp')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
            </div>
            <div class="ml-10 mt-4">
                <p class="mb-1 ml-2 font-bold text-sm">Latitude<span style="color:red"> &#x26B9;</span></p>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Latitude" name="latitude" id="latitude"  value={{ old('latitude') }}>
                    @error('latitude')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
            </div>
            <div class="ml-10 mt-4">
                <p class="mb-1 ml-2 font-bold text-sm">Longitude<span style="color:red"> &#x26B9;</span></p>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Longitude" name="longitude" id="longitude"  value={{ old('longitude') }}>
                    @error('longitude')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
            </div>
            <div class="ml-10">
                <label class="label mt-0">
                    <span class=" label-text ml-1 text-sm font-bold">Deskripsi<span style="color:red"> &#x26B9;</span> </span>
                </label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" cols="30" rows="4"
                    class="input input-bordered input-accent h-40 w-80 @error('deskripsi') is-invalid @enderror"
                    value={{ old('deskripsi') }}></textarea>
                @error('deskripsi')
                    <div>
                        <label class="text-red-700">{{ $message }}</label>
                    </div>
                @enderror
            </div>
            <div class="mt-0 relative bordered ml-12 mt-2">
                <label class="font-semibold"> Pilih Foto : <span style="color:red"> &#x26B9;</span></label>
                <div class="">
                    <div class="max-w-1/3 h-20 rounded-lg ">
                        <div class="items-center justify-center w-full h-10">
                            <input type="file" id="image" name="image"
                                class="flex h-10 mt-2 ml-6 @error('image') is-invalid @enderror"
                                value={{ old('image') }}>
                        </div>
                    </div>
                </div>
                @error('image')
                    <div>
                        <label class="text-red-700">{{ $message }}</label>
                    </div>
                @enderror
            </div>
            <div class="flex justify-start">
                <div class="flex ml-16 mb-10 mt-8">
                    <button
                        class="inline-block px-12 py-3 w-30 h-12 text-sm font-medium text-green-600 border border-green-600 rounded hover:bg-green-600 hover:text-white active:bg-green-500 focus:outline-none focus:ring">
                        <span class="ml-2  font-semibold text-lg">Submit</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-2">
        <p class="mb-2 font-semibold">Geser Marker warna biru ke titik lokasi objek wisata yang ingin ditambahkan</p>
        <div id="mapid"></div>
    </div>
</div>


<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script>
    var curLocation=[0,0];
    if(curLocation[0]==0 && curLocation[1]==0){
        curLocation =[5.20198874957, 96.7025611719];
    }
    let latLng = [5.20198874957, 96.7025611719];
    var mymap = L.map('mapid').setView(latLng, 14);
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Leaflet</a>',
            id: 'mapbox/streets-v11',
        }).addTo(mymap);
    mymap.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position,{
            draggable : 'true'
        }).bindPopup(position).update();
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng).keyup();
    });
        $("#latitude, #longitude").change(function(){
            var position =[parseInt($("#latitude").val()), parseInt($("#longitude").val())];
            marker.setLatLng(position,{
                draggable : 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
        });

    mymap.addLayer(marker);
    

</script>