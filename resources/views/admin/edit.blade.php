@extends('layouts.main')
@section('contents')

<h1 class="text-2xl font-semibold font-sans ml-8 mt-4"> Edit Objek Wisata</h1>

        <div class="mt-4 ml-8">
            <a href="/masjid">
                <button class="btn btn-sm btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                    </svg>
                    <span>Back</span>
                </button>
            </a>
        </div>

            @if(session()->has('pesan'))
                <div class="flex w-full max-w-sm ml-6 overflow-hidden bg-gray-100 rounded-lg shadow-md dark:bg-gray-200">
                    <div class="flex items-center justify-center w-12 bg-green-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                        </svg>
                    </div>
                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span
                                class="font-semibold text-green-500 dark:text-green-400">{{ session('pesan') }}</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200"></p>
                        </div>
                    </div>
                </div>
            @endif
        <div class="ml-24">
            <form action="/masjid/{{ $masjid->id }}/" method="POST" enctype="multipart/form-data" class="ml-10">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="ml-10 mt-4">
                    <p class="mb-1 ml-2 font-bold text-sm"> Nama Masjid atau Dayah<span style="color:red"> &#x26B9;</span></p>
                    <input class="input input-bordered input-success w-full max-w-xs" type="text"
                        placeholder="Nama Masjid atau Dayah" name="nama" id="nama" value="{{ $masjid->nama }}">
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
                    <select name="kecamatan" id="kecamatan" class="select max-w-xs select-accent w-80" value="{{ $masjid->kecamatan }}">
                        <option value="{{ $masjid->kecamatan }}"> Pilih Kecamatan</option>
                        <option value="Gandapura"> Gandapura</option>
                        <option value="Jangka"> Jangka </option>
                        <option value="Jeumpa"> Jeumpa</option>
                        <option value="Jeunieb"> Jeunieb </option>
                        <option value="Juli"> Juli</option>
                        <option value="Kota Juang"> Kota Juang</option>
                        <option value="Kuala"> Kuala</option>
                        <option value="Kuta Blang"> Kuta Blang </option>
                        <option value="Pandrah"> Pandrah</option>
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
                    <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Desa" name="desa"
                        id="desa" value="{{ $masjid->desa }}">
                    @error('desa')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="ml-10 mt-4">
                    <p class="mb-1 ml-2 font-bold text-sm">Alamat Lengkap<span style="color:red"> &#x26B9;</span></p>
                    <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Alamat Lengkap"
                        name="alamat" id="alamat" value="{{ $masjid->alamat }}">
                    @error('alamat')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="ml-10 mt-4">
                    <p class="mb-1 ml-2 font-bold text-sm">No HP <span style="color:red"> &#x26B9;</span> </p>
                    <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="No HP"
                        name="no_hp" id="no_hp" value="{{ $masjid->no_hp }}">
                    @error('no_hp')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="ml-10 mt-4">
                    <p class="mb-1 ml-2 font-bold text-sm">Latitude<span style="color:red"> &#x26B9;</span></p>
                    <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Latitude"
                        name="latitude" id="latitude" value="{{ $masjid->latitude }}">
                    @error('latitude')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="ml-10 mt-4">
                    <p class="mb-1 ml-2 font-bold text-sm">Longitude<span style="color:red"> &#x26B9;</span></p>
                    <input class="input input-bordered input-success w-full max-w-xs" type="text" placeholder="Longitude"
                        name="longitude" id="longitude" value="{{ $masjid->longitude }}">
                    @error('longitude')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="h-40 w-80 ml-10">
                    <label class="label mt-2">
                        <span class=" label-text ml-2 font-bold">Deskripsi <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" cols="30" rows="4"
                        class="input input-bordered input-accent input- h-40 w-80 @error('deskripsi') is-invalid @enderror">{{ $masjid->deskripsi }}</textarea>
                    @error('deskripsi')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>

                <div class="mt-10 ml-10">
                    <div class="mb-3 w-60">
                        <label for="image" class="form-label inline-block mb-2 font-bold"> Pilih Foto <span style="color:red"> &#x26B9;</span></label>
                       @if($masjid->image )
                       <img src="{{asset('/storage/'.$masjid->image) }}">
                       @else
                       <img name="image" class="img-preview"
                       src="{{asset('/storage/'.$masjid->image) }}" >
                       @endif
                        <input name="image" onchange="previewImage()"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{ asset('/storage/'.$masjid->image) }}" type="file" id="image"
                            @error('image') is-invalid @enderror>
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
                        <span class="ml-2  font-semibold text-lg">Update</span>
                    </button>
                </div>
            </div>
        </form>
        </div>
@endsection
<script>
     function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('img-preview');

            imgPreview.style.display = 'block';

            const oFrReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            oFrReader.onLoad = function (ofREvent) {
                imagePreview.src = ofREvent.target.result;
            }
        }
</script>